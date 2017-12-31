<?php
session_start();
//print_r($_COOKIE);
if(!empty($_POST["submit1"])) {
	include_once("db_connection.php");
	//print_r($_POST);
	
	$res=mysqli_query($conn,"select * from user_role where username='$_POST[username]' && password='$_POST[pwd]'");
	$row=mysqli_fetch_array($res);
		if (!empty($row)) 
		{
			$_SESSION["user"]=$row["username"];
			$_SESSION["role"]=$row["role"];
			$_SESSION["id"]=$row["id"];
			$_SESSION["colour_code"]=$row["colour_code"];
			//echo $row["role"];

			if(!empty($_POST["remember"])) {
				setcookie ("user",$_POST['username'],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("password",$_POST["pwd"],time()+ (10 * 365 * 24 * 60 * 60));
				//echo 'Hi'. $_COOKIE["user"];
			} else {
				if(isset($_COOKIE["user"])) {
					setcookie ("user","");
				}
				if(isset($_COOKIE["password"])) {
					setcookie ("password","");
				}
			}
		}
		else echo "Enter Valid Credentials!";
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>
	<?php  if(empty($_SESSION["user"])) { ?>
  <form class="login-container" name="form1" action="" method="post">
    <p><input type="text" placeholder="User Name" required name="username" value="<?php if(isset($_COOKIE['user'])) echo $_COOKIE['user']; ?>"></p>
    <p><input type="password" placeholder="Password" required name="pwd" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" ></p>

	<div style="float:left; display: inline-block;">
	<div style="float:left">
		<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE['user'])) { echo "checked='checked'"; } ?> />
	</div>
	<div style="float:center , display:block;"> &nbsp&nbsp&nbsp&nbspRemember me</div>
	</div>
	
    <p><input type="submit" name="submit1" value="Log in"></p>
  </form>
</div>


<?php } else { 

			if ($_SESSION["role"] == 'ADMIN' || $_SESSION["role"] == 'ASSI') {
				
			?>
			<script type="text/javascript">
			window.location="index.php";
			</script>
			<?php	
			}
			
			if ($_SESSION["role"] == 'ASMT')
			{
			?>
			<script type="text/javascript">
			window.location="display_cal.php?status=ASMT";
			</script>
			<?php	
			}//Role Check for Assesment Close
			
			if ($_SESSION["role"] == 'INST')
			{
			?>
			<script type="text/javascript">
			window.location="display_cal.php?status=INST";
			</script>
			<?php	
			}//Role Check for Installation Close
 } ?>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </body>
</html>
