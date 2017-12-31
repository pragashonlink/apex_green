<?php
session_start();
if($_SESSION["role"] != 'ADMIN') {
    header('location: index.php');
    exit();
}
include_once("db_connection.php");

if(isset($_POST['create'])) {
    $fullname = '';
    $username = '';
    $password = '';
    $confirm_password = '';
    $message = '';
    $role = '';
    $errors = [];
    //print_r($_POST);

    if(isset($_POST['user_name']) && !empty($_POST['user_name'])) {
        $username = trim($_POST['user_name']);
    } else {
        $errors[] = 'Username is required';
    }

    if(isset($_POST['user_password']) && !empty($_POST['user_password'])) {
        $password = trim($_POST['user_password']);
    } else {
        $errors[] = 'Password is required';
    }

    if(isset($_POST['user_role']) && !empty($_POST['user_role'])) {
        $role = $_POST['user_role'];
    } else {
        $errors[] = 'Assessor Role is required';
    }

    if(isset($_POST['user_message']) && !empty($_POST['user_message'])) {
        $message = trim($_POST['user_message']);
    }

    $updated_by = $_SESSION["role"];

//echo " i m outside";

    if(empty($errors)) {
        $Insert_query = "INSERT INTO user_role (username,password,role, message, updated_by) 
								   VALUES('$username','$password', '$role','$message','$updated_by')";

        //echo "Insert_query is : ". $Insert_query;
        if (!mysqli_query($conn,$Insert_query))
        {
            $errors[] = 'An error is occurred';
        }
        else{
            $success = 'User is successfully created.';

        }
    }


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Apexgreen Admin</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
    <style>
        form {
            /* Just to center the form on the page */
            margin: 0 auto;
            width: 550px;
            /* To see the outline of the form */
            padding: 1em;
            border: 1px solid #CCC;
            border-radius: 1em;
        }
        form div + div {
            margin-top: 1em;
        }
        label {
            /* To make sure that all labels have the same size and are properly aligned */
            display: inline-block;
            width: 130px;
            text-align: right;
            font-family:'Raleway',sans-serif;
            font-size:12.5px
        }
        input, textarea {
            /* To make sure that all text fields have the same font settings By default, textareas have a monospace font */
            font: 1em sans-serif;
            /* To give the same size to all text fields */
            width: 350px;
            height:30px;
            box-sizing: border-box; /* To harmonize the look & feel of text field border */
            border: 1px solid #999;
        }
        input:focus, textarea:focus {
            /* To give a little highlight on active elements */
            border-color: #000;
        }
        textarea {
            /* To properly align multiline text fields with their labels */
            vertical-align: top;
            /* To give enough room to type some text */
            height: 5em;
        }
        .button {
            /* To position the buttons to the same position of the text fields */
            padding-left: 90px;
            /* same size as the label elements */
        }
        button {
            /* This extra margin represent roughly the same space as the space between the labels and their text fields */
            margin-left: .5em;
        }
        select {

            background-repeat:no-repeat;
            background-position:300px;
            width:300px;
            height:38px;
            padding:12px;
            margin-top:8px;
            font-family:Cursive;
            line-height:1;



            font-size:14px;
            -webkit-appearance:none;

            outline:none
        }
        #send {
            width:20%;
            height:35px;
            margin-top:10px;
            border-radius:3px;
            background-color:#0000cc;
            border:1px solid #fff;
            color:#fff;
            font-family:'Raleway',sans-serif;
            font-size:12px
        }





    </style>
    <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <!-- END: load jqplot -->
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>

</head>
<body>
<div class="container_12">
    <div class="grid_12 header-repeat">
        <?php
        include "head.php";
        ?>
    </div>



    <div class="clear">
    </div>
    <div class="grid_2">
        <div class="box sidemenu">
            <div class="block" id="section-menu">

                <?php
                include "sidebar.php";
                ?>
            </div>
        </div>
    </div>

    <div class="grid_10">

        <div class="clear">
        </div>


        <div class="box round first">
            <h2 align="center"> Create User </h2>

            <div class="block" >
                <form action="" method="post">
                    <?php
                    if(isset($errors) && !empty($errors)) {
                        echo '<div style="color: red; padding: 15px; background-color: rgba(255,15,0,0.47);">';
                        foreach ($errors as $err) {
                            echo '<p>', $err, '</p>';
                        }
                        echo '</div>';
                    } else if(isset($success) && !empty($success)) {
                        echo '<div style="color: green; padding: 15px; background-color: #bef9be;">';
                        echo $success;
                        echo '</div>';
                    }
                    ?>
                    <div>
                        <label for="username">Username *</label>
                        <input type="text" id="username" name="user_name" required value="<?php echo (isset($_POST['user_name'])) ? $_POST['user_name'] : '' ?>">
                    </div>
                    <div>
                        <label for="Password">Password *</label>
                        <input type="password" id="Password" name="user_password" required>
                    </div>

                    <div>
                        <label for="mail">Assessor Role *</label>
                        <SELECT style="width: 350px" style="width: 30px" size=1 name="user_role" required>
                            <OPTION value="" selected>-- Select role --</OPTION>
                            <OPTION value='ADMIN' <?php echo (isset($_POST['user_role']) && $_POST['user_role'] === 'ADMIN') ? 'selected' : '' ?>>Admin</OPTION>
                            <OPTION value='ASSI' <?php echo (isset($_POST['user_role']) && $_POST['user_role'] === 'ASSI') ? 'selected' : '' ?>> Assistant Admin</OPTION>
                            <OPTION value='INST' <?php echo (isset($_POST['user_role']) && $_POST['user_role'] === 'INST') ? 'selected' : '' ?>>Installation</OPTION>
                            <OPTION value='ASMT' <?php echo (isset($_POST['user_role']) && $_POST['user_role'] === 'ASMT') ? 'selected' : '' ?>>Assement</OPTION>
                        </SELECT>
                    </div>

                    <div>
                        <label for="msg">Comments</label> <textarea id="msg" name="user_message"><?php echo (isset($_POST['user_message'])) ? $_POST['user_message'] : '' ?></textarea>
                    </div>
                    <div class="button">
                        <button type="submit" name="create" id="send">Create User</button>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <button type="reset" id="send" onclick="window.location.reload()">Reset</button>
                    </div>


                </form>





            </div>
        </div>
    </div>

    <div class="clear">
    </div>
</div>
</div>
</div>

</div>

<div class="clear">
</div>
</div>
<div class="clear">
</div>
<div id="site_info">
    <p>
        Admin by Neha Mishra.
    </p>
</div>
</body>
</html>
