<?php
   session_start();
//   echo "i am out";
   if (!isset($_SESSION["role"])&&($_SESSION["role"]<>'ADMIN'))
  {
	   //echo "i am in";
	   //echo $_SESSION["role"];
	   header("Location: login.php");
   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Apexgreen Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
	
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
	
    <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <!-- END: load jqplot -->
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupDashboardChart('chart1');
            setupLeftMenu();
			setSidebarHeight();


        });
    </script>
			 
			  <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

 th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
	font-family:'Raleway',sans-serif;
font-size:12.5px
}
td
{
    border: solid 1px #dddddd;
    border-left: none;
    border-right: none;
	 text-align: center;
    padding: 8px;
	font-family:Arial, Helvetica, sans-serif;
font-size:12.5px
}
#send {
width:10%;
height:35px;
margin-top:10px;
border-radius:3px;
background-color:#006600;
border:1px solid #fff;
color:#fff;
font-family:'Raleway',sans-serif;
font-size:12px
}
#delete {
width:10%;
height:35px;
margin-top:10px;
border-radius:3px;
background-color:#cc0000;
border:1px solid #fff;
color:#fff;
font-family:'Raleway',sans-serif;
font-size:12px
}



select {

background-repeat:no-repeat;
background-position:300px;
width:353px;
padding:12px;
margin-top:8px;
font-family:Arial, Helvetica, sans-serif;
line-height:1;
border-radius:5px;


font-size:14px;
-webkit-appearance:none;

outline:none
}
#se {
width:10%;
height:35px;
margin-top:10px;
border-radius:3px;

border:1px solid #fff;

font-family:'Raleway',sans-serif;
font-size:12px
}
#input {

background-repeat:no-repeat;
background-position:300px;
background-color:sky blue;
width:353px;
padding:12px;
margin-top:8px;
font-family:'Raleway',sans-serif;;
line-height:1;
border-radius:5px;


font-size:14px;
-webkit-appearance:none;

outline:none
}
</style>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <?php
               include "head.php";
			   session_start();
			?>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            
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
		 
               
               <div class="box round">
			   
                <h2>
                   Search</h2>  <div id="search_count"></div>
                <div class="block">
                   <?php
                    include "search.php";
					?>
                    <div class="clear">
                    </div>
                </div>
            </div>
				
				
				
            
			   
            <div class="box round first">
                <h2>
                    All Enquiries <?php echo $num_rows ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				  <input id="send" type="submit" name="emailSelected"  value="Email Selected"  onclick="div_show()">
				 &nbsp&nbsp&nbsp&nbsp
				 <input id="delete" type="submit" name="delete_selected" value="Delete Selcted" onClick="delete_selected()" style="width: 100px" size=1/>
				 &nbsp&nbsp&nbsp&nbsp
				  <input id="send" type="reset" value=" Reset Search"style="width: 150px" size=1 name="submit" onclick="window.location.reload()" />&nbsp&nbsp&nbsp&nbsp
				  <input id="send" type="submit" name="create_excel" value="Export list" onclick="window.location='excel_export2.php'" style="width: 100px" size=1/>
				 </h2>
				 <script>
				 function export_excel () {
	 alert( 'i am in export' );
	<?php include('excel_export2.php'); ?>
 }
			</script>	 
                <div class="block">
                    <div id="employee_table">
					<?php
				include_once("db_connection.php");
				$email_arr = "";
			
			if (!empty($search_query) AND !is_null($search_query))
			{$select_query = $search_query;
				//echo 'i have search';
				}
			else
			{
			$select_query = "select i.ID, i.insert_time,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,ifnull(lse.status_code,'NEW') status_code from insulations i left outer join lead_status_event lse on i.ID = lse.id where YEAR(insert_time) = YEAR(CURRENT_DATE()) AND MONTH(insert_time) = MONTH(CURRENT_DATE()) order by id desc";
			//echo 'i dont have search';
			}
			//echo $select_query;
			$res = mysqli_query($conn, $select_query);
			$num_rows=mysqli_num_rows($res);
			if (!empty($search_query) AND !is_null($search_query))
			{
			echo "<h5>";
			echo "search &nbsp".  $num_rows;
			echo "</h5>";
			}
            echo "<table id='index_table' border='1'  border-collapse: collapse; width=100%>";
			
            echo "<tr bgcolor='#d0d0e1'>";
			echo "<tr bgcolor='#1ab2ff'>";
			echo "<td style='font-weight:bold'>"; echo "/"; echo "</td>";
			echo "<td style='font-weight:bold'>"; echo "Serial No"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Date & Time"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Customer Name"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Address"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Post Code"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Telephone 1"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Telephone 2"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Email"; echo "</td>";
			echo "<td style='font-weight:bold'>"; echo "Notes"; echo "</td>";
			
            //echo "<td style='font-weight:bold'>"; echo "view order"; echo "</td>";
            echo "</tr>";
			
			//$sno = 1;
			
			$col="#ffffff";//default white color
			
            while($row=mysqli_fetch_array($res))
            {
				if ($row["status_code"] == 'ASMT') //Assesment Check
				{
					$col="#80e5ff";//light blue
				}
				if ($row["status_code"] == 'INST') //installation
				{
					$col="#cc00cc";//Light Green
				}
				if ($row["status_code"] == 'UTA') //Unable to answer
				{
					$col="#ffff1a";//default Gray color
				}
				if ($row["status_code"] == 'RDTB') //Ready to book
				{
					$col="#00cc66";//default Gray color
				}
				if ($row["status_code"] == 'QULI') //Qualified lead
				{
					$col="pink";//default Gray color
				}
				if ($row["status_code"] == 'REM') //Reminder
				{
					$col="#ff9999";//default Gray color
				}
				if ($row["status_code"] == 'COMP') //completed
				{
					$col="#ff0066";//default Gray color
				}
				if ($row["status_code"] == 'RJCT') //Rejected
				{
					$col="#ff0000";//default Gray color
				}
				if ($row["status_code"] == 'VC') //Rejected
				{
					$col="GOLD";//default Gray color
				}
				if ($row["status_code"] == 'RAA') //Rejected
				{
					$col="DARK Green";//default Gray color
				}
				if ($row["status_code"] == 'CBNR') //Rejected
				{
					$col="GREEN";//default Gray color
				}
				if ($row["status_code"] == 'NEW') //Rejected
				{
					$col="#ffffff";//default Gray color
				}

				
				//$res_event = mysqli_query($conn, "select * from events where id = ".$row['ID'].";");
				
                echo "<tr bgcolor='$col'>";
				echo "<td>"; 
				echo "<input type='checkbox' name='chkid' value='".$row['ID']."' onClick=set_email_arr('".$row['ID']."')>";
				echo "</td>";
				echo "<td>"; 
				//echo $row["ID"]; 
				echo "<a href=" .'lead_details.php'."?id=".$row['ID'].">" . $row['ID'] . "</a>";
				echo "</td>";
				echo "<td>"; echo $row["insert_time"]; echo "</td>";
				//echo "<td>"; echo mysqli_fetch_array($res_event)["start"]; echo "</td>";
                echo "<td>"; echo $row["title"] . ' ' . $row["forename"] . ' ' . $row["surname"]; echo "</td>";
                echo "<td>"; echo $row["address"]; echo "</td>";
                echo "<td>"; echo strtoupper ($row["postcode"]); echo "</td>";
                echo "<td>"; echo $row["phone"]; echo "</td>";
                echo "<td>"; echo $row["altno"]; echo "</td>";
                echo "<td>"; echo $row["email"]; echo "</td>";
				echo "<td>"; echo $row["notes"]; echo "</td>";
				 echo "</tr>";
				 //$sno=$sno+1;
            }
            echo "</table>";

            ?>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="grid_5">
            
        </div>
       
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
		2017 Apex Green. |  Apex Green!
        </p>
    </div>
	<div id="abc">
		<!-- Popup Div Starts Here -->
		<div id="popupContact">
		<!-- Email selected Form -->
		<form id="form1" name="form">
		<img id="close" src="img/cross.png" onclick ="div_hide()">

		<input name="sub" required placeholder="Subject" type="text" value="" style="width:100%"  />
		<textarea id="msg"  required name="message" placeholder="Message" ></textarea>
		<input type="button" id="submit" name="send" value="Send" " onclick="send_email(sub.value,message.value)" />


		</form>
		</div>
	<!-- Popup Div Ends Here -->
	</div>
</body>
<!-- Body Ends Here -->

<script type="text/javascript">
var_sel_id_arr = [ ]; //array to store selected ids

// Validating Empty Field
function check_empty() {
alert("Ready to submit form");
document.getElementById("form").submit();
alert("Form Submitted Successfully...");

}

//function to export to excel

 

function delete_selected()
{
		$.ajax({
           type: "POST",
           url: 'delete_selected.php',
		   data: { vids: var_sel_id_arr},
           success: function(v) {
			   alert (v);
			   window.location='index.php';
           }
      });
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}

</script>
<script type="text/javascript">
var_sel_id_arr = [ ]; //array to store selected ids

// Validating Empty Field
function check_empty() {
alert("Ready to submit form");
document.getElementById("form").submit();
alert("Form Submitted Successfully...");

}

//function to export to excel

 
function send_email(vsub,vmsg)
{
	//alert("reay to send"+vsub+vmsg);
	console.log(vsub);
	console.log(vmsg);
	div_hide();
	$.ajax({
           type: "POST",
           url: 'email_selected.php',
		   data: { vids: var_sel_id_arr, sub: vsub, msg: vmsg },
           success: function(v) {
			   alert (v);
			   //window.location='lead_details.php?id='+v_lead_id;
           }
      });
}
function delete_selected()
{
		$.ajax({
           type: "POST",
           url: 'delete_selected.php',
		   data: { vids: var_sel_id_arr},
           success: function(v) {
			   alert (v);
			   window.location='index.php';
           }
      });
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}

function set_email_arr(v) {
	//console.log(v);
	var index = var_sel_id_arr.indexOf(v);
	//console.log(index);
	//alert ('index of ' +v ' is ' + index);
	if (index > -1) {
		var_sel_id_arr.splice(index, 1);
	}
	else{
	var_sel_id_arr.push(v);
	}
	//console.log(var_sel_id_arr);
 }
  
</script>

</html>

<style>
select {
	background-repeat:no-repeat;
	background-position:300px;
	width:353px;
	padding:12px;
	margin-top:8px;
	font-family:Cursive;
	line-height:1;
	border-radius:5px;
	font-size:14px;
	-webkit-appearance:none;
	outline:none
}
#se {
	width:10%;
	height:35px;
	margin-top:10px;
	border-radius:3px;
	border:1px solid #fff;
	font-family:'Raleway',sans-serif;
	font-size:12px
}
@import "http://fonts.googleapis.com/css?family=Raleway";
#abc {
width:100%;
height:100%;
opacity:.95;
top:0;
left:0;
display:none;
position:fixed;
background-color:#313131;
overflow:auto
}
img#close {
	
position:absolute;
right:-14px;
top:-14px;
cursor:pointer
}
div#popupContact {
position:absolute;
left:50%;
top:17%;
margin-left:-202px;
font-family:'Raleway',sans-serif
}
#form1 {
max-width:400px;
min-width:250px;
padding:10px 50px;
border:2px solid gray;
border-radius:10px;
font-family:raleway;
background-color:#fff
}
p {
margin-top:30px
}
h2 {
background-color:#FEFFED;
padding:20px 35px;
margin:-10px -50px;
text-align:center;
border-radius:10px 10px 0 0
}
hr {
margin:10px -50px;
border:0;
border-top:1px solid #ccc
}


textarea {
width:100%;
height:180px;
margin-top:10px;
padding:5px;
box-shadow:1px 1px 12px gray;
border-radius:3px
}
#submit {
text-decoration:none;
width:100%;
margin-top:10px;
text-align:center;
display:block;
background-color:#0000cc;
color:#fff;
border:1px solid #FFCB00;
padding:10px 0;
font-size:20px;
cursor:pointer;
border-radius:5px
}



</style>