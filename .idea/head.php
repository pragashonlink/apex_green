<?php
   session_start();
   $var_user=$_SESSION["user"];
?>
<div id="branding">
	<div class="floatleft">
		<font color="#FFFFFF" style="font-size:20px ">Apexgreen
		</font>
	</div>
    <div class="floatright">
		<div class="floatleft">
			<img src="img/img-profile.jpg" alt="Profile Pic" />
		</div>
        <div class="floatleft marginleft10">
			<ul class="inline-ul floatleft">
				<li>Hello <?php echo $var_user; ?> </li>
				<!--li class="ic-notifications"><a href="notifications.html"><span>&nbsp&nbsp&nbsp&nbspNotifications</span></a></li-->
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <br/>
            <span class="small grey"></span>
        </div>
    </div>
    <div class="clear"></div>
</div>