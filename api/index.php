<?php
ob_start();
session_start();
require_once '../db_connection.php';

if ( isset($_SESSION['site_id'])!="" ) {
    header("Location: dashboard.php");
    exit;
}

$error = false;

if( isset($_POST['login']) ) {

    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['lg-email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['lg-password']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    // prevent sql injections / clear user invalid inputs

    if(empty($email)){
        $error = true;
        $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }

    if(empty($pass)){
        $error = true;
        $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {

        $password = hash('sha256', $pass); // password hashing using SHA256

        $query = "SELECT `id`, `name`, `password` FROM site_details WHERE `email`='$email' AND `password` = '$password'";
        $result = mysqli_query($conn, $query);

        if($result) {
            $row = $result->fetch_array();
            $count = mysqli_num_rows($result); // if uname/pass correct it returns must be 1 row
            //$userRow = $result->fetch_array();
            /*while($row = $result->fetch_assoc()) {
                $userRow = $row;
            }*/

            if( $count == 1 && $row['password'] == $password ) {
                $_SESSION['site_id'] = $row['id'];
                header("Location: dashboard.php");
            } else {
                $errMSG = "Incorrect Credentials, Try again...";
            }
        }else {
            $errMSG = "Something went wrong, Try again...";
        }
    }

}

if ( isset($_POST['register']) ) {

    // clean user inputs to prevent sql injections
    $comp_name = trim($_POST['rg-company']);
    $comp_name = strip_tags($comp_name);
    $comp_name = htmlspecialchars($comp_name);

    $url = trim($_POST['rg-url']);

    $email = trim($_POST['rg-email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['rg-password']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $pass_repeat = trim($_POST['rg-password-repeat']);
    $pass_repeat = strip_tags($pass_repeat);
    $pass_repeat = htmlspecialchars($pass_repeat);

    // basic name validation
    if (empty($comp_name)) {
        $error = true;
        $nameError = "Please enter your company name.";
    } else if (strlen($comp_name) < 2) {
        $error = true;
        $nameError = "Name must have at least 2 characters.";
        /*} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            $error = true;
            $nameError = "Name must contain alphabets and space.";
        }*/
    }
    //URL validation
    if (empty($url)) {
        $error = true;
        $urlError = "Please enter a valid URL.";
    } else if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $error = true;
        $urlError = "Please enter a valid URL.";
    } else {
        $url = urlencode($url);
        $url = mysqli_real_escape_string($conn, $url);
    }

    //basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $regEmailError = "Please enter a valid email address.";
    } else if (empty($email)) {
        $error = true;
        $regEmailError = "Please enter a valid email address.";
    } else {
        // check email exist or not
        $query = "SELECT `email` FROM site_details WHERE `email`='$email'";
        $result = mysqli_query($conn, $query);

        //$row = $result->fetch_array();
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            $error = true;
            $regEmailError = "Provided Email is already in use.";
        }
    }
    // password validation
    if (empty($pass)) {
        $error = true;
        $regPassError = "Please enter password.";
    } else if (strlen($pass) < 6) {
        $error = true;
        $regPassError = "Password must have atleast 6 characters.";
    }

    // password match
    if (empty($pass)) {
        $error = true;
        $passMatchError = "Please repeat your password.";
    } else if ($pass !== $pass_repeat) {
        $error = true;
        $passMatchError = "Passwords do not match.";
    }



    // if there's no error, continue to signup
    if (!$error) {

        // password encrypt using SHA256();
        $password = hash('sha256', $pass);
        $api_key = md5($email.$comp_name);
        $query = "INSERT INTO site_details (`name`, `url`, `email`, `password`, `api_key`) VALUES('$comp_name','$url','$email','$password','$api_key')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            $errTyp = "success";
            $regErrMSG = "Successfully registered, you may <a id='goto-login-tab' href='#login' data-toggle='tab'>login</a> now";
            unset($name);
            unset($email);
            unset($pass);
        } else {
            $errTyp = "danger";
            $regErrMSG = "Something went wrong, try again later... "; //.$conn->error
        }

    }

    /*echo '<pre>';
    print_r($_POST);
    echo '</pre>';*/

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ApexGreen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/login-register-styles.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header class="">
    <div class="container-fluid">
        <br/>
        <h1 class="text-center">ApexGreen</h1>
        <br/>
        <br/>
    </div>
</header>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-push-4 login-register-wrapper">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a>
                </li>
                <li role="presentation">
                    <a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="login">
                    <!--<h2 class="header">Login</h2>-->
                    <?php
                    if (isset($errMSG)) {
                        ?>
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <span class="fa fa-info-circle"></span> <?php echo $errMSG; ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <form id="login-form" action="#login" method="post">
                        <br/>
                        <div class="form-group label-merged-input">
                            <label for="lg-email" class="control-label">Username</label> <sup class="text-danger">*</sup>
                            <input type="text" id="lg-email" class="form-control" name="lg-email" value="<?php echo (isset($_POST['lg-email'])) ? $_POST['lg-email'] : '' ?>"/>
                            <span class="text-danger"><?php echo (isset($emailError)) ? $emailError : ''; ?></span>
                        </div>
                        <div class="form-group label-merged-input">
                            <label for="lg-password" class="control-label">Password</label> <sup class="text-danger">*</sup>
                            <input type="password" id="lg-password" class="form-control" name="lg-password"/>
                            <span class="text-danger"><?php echo (isset($passError)) ? $passError : ''; ?></span>
                        </div>
                        <div class="form-group ico-btn">
                            <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                        </div>
                    </form>
                    <a href="#register" class="register-link" onclick="">Don't have an account? Register now!</a>
                </div>
                <div role="tabpanel" class="tab-pane" id="register">
                    <?php
                    if ( isset($regErrMSG) ) {

                        ?>
                        <div class="form-group">
                            <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                                <span class="fa fa-info-circle"></span> <?php echo (isset($regErrMSG)) ? $regErrMSG : ''; ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <form id="register-form" action="#register" method="post">
                        <br/>
                        <div class="form-group label-merged-input">
                            <label for="lg-username" class="control-label">Company Name</label> <sup class="text-danger">*</sup>
                            <input type="text" id="rg-company" class="form-control" name="rg-company" value="<?php echo (isset($_POST['rg-company'])) ? $_POST['rg-company'] : '' ?>"/>
                            <span class="text-danger"><?php echo (isset($nameError)) ? $nameError : ''; ?></span>
                        </div>
                        <div class="form-group label-merged-input">
                            <label for="lg-username" class="control-label">Site URL</label> <sup class="text-danger">*</sup>
                            <input type="text" id="rg-url" class="form-control" name="rg-url" placeholder="http://www.example.com" value="<?php echo (isset($_POST['rg-url'])) ? $_POST['rg-url'] : '' ?>"/>
                            <span class="text-danger"><?php echo (isset($urlError)) ? $urlError : ''; ?></span>
                        </div>
                        <div class="form-group label-merged-input">
                            <label for="lg-username" class="control-label">Email</label> <sup class="text-danger">*</sup>
                            <input type="text" id="rg-email" class="form-control" name="rg-email" value="<?php echo (isset($_POST['rg-email'])) ? $_POST['rg-email'] : '' ?>"/>
                            <span class="text-danger"><?php echo (isset($regEmailError)) ? $regEmailError : ''; ?></span>
                        </div>
                        <div class="form-group label-merged-input">
                            <label for="lg-password" class="control-label">Password</label> <sup class="text-danger">*</sup>
                            <input type="password" id="rg-password" class="form-control" name="rg-password"/>
                            <span class="text-danger"><?php echo (isset($regPassError)) ? $regPassError : ''; ?></span>
                        </div>
                        <div class="form-group label-merged-input">
                            <label for="lg-password" class="control-label">Repeat Password</label> <sup class="text-danger">*</sup>
                            <input type="password" id="rg-password-repeat" class="form-control" name="rg-password-repeat"/>
                            <span class="text-danger"><?php echo (isset($passMatchError)) ? $passMatchError : ''; ?></span>
                        </div>
                        <div class="form-group ico-btn">
                            <button class="btn btn-primary btn-block" type="submit" name="register">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/login-register.js"></script>
</body>