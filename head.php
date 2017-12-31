<?php
   /*session_start();*/
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

<div id="modal">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-body">
        Loading...
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="completed-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pick Completed Date</h4>
            </div>
            <div class="modal-body text-center">
                <div id="completed_datepicker" data-date-format="dd/mm/yyyy"></div>
                <input type="hidden" id="completed_date">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="width: auto;">Close</button>
                <button type="button" class="btn btn-primary" style="width: auto;" onclick="saveCompletedDate();">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-xs" id="loading-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4>Please wait...</h4>
            </div>
        </div>
    </div>
</div>