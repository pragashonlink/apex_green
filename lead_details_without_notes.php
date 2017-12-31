<?php
   session_start();
   $v_role=$_SESSION["role"];
   if ($v_role == 'ADMIN') $var_admin='ADMIN';
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
	<link rel="stylesheet" type="text/css" href="css/main.css">
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
<!--Date Picker Style Code Starts-->
	<script src="js/my_js.js"></script>
 <!--Date Picker-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
        <script>
          $(function() {
            $( ".datepicker" ).datepicker();
          });

          $.datepicker.setDefaults(
              $.extend(
                {'dateFormat':'mm-dd-yy'},
                $.datepicker.regional['fr']
              )
            );
        </script>
<!--Date Picker Style Code Ends-->

<?php
include_once("db_connection.php");
					
$var1 = $_GET['id'];
//echo "Value in get value  " . $var1 ;

$query = "select i.ID, i.insert_time,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,i.fuel_type,i.notes,i.wall_insulation_type,i.roof_insulation_type,i.owner,i.benefits,i.created_by,ifnull(lse.status_code,'NEW') status_code,lse.start from insulations i left outer join lead_status_event lse on i.ID = lse.id where i.id = $var1";
//echo "query : " . $query;

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

?>
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
       
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                     <?php
					 if ($v_role == 'ADMIN')
					 {include "sidebar.php";}
					?>
                </div>
            </div>
        </div>
		
        
        <div class="grid_10">
            <div class="box round first">
			<div class="grid_12"></div>
                <div class="box round first">
                <div class="block">
               <table style="width:54%" align="center" >
				   <tr><th  colspan="2"  >
					   <h4  style="border:1px solid #0000cc; padding:0; " align="center" id="sd" >Lead Details</h4></th>
				   </tr>
				  <!-- <tr>
					<th>Full Name:</th>
					<th contenteditable='true' id="fn"><?php echo $row["title"] . ' ' . $row["forename"] . ' ' . $row["surname"];; ?></th>
				  </tr>-->
				   <tr>
					<th>Title:</th>
					<th contenteditable="<?php if ($v_role <> 'ADMIN') echo 'false';?>"><div id="title"><?php echo $row['title'] ; ?></div></th>
				  </tr>
				   <tr>
					<th >First Name:</th>
					<th contenteditable='true'><div id="fn"><?php  echo empty($row['forename'])? "-null-": $row['forename']; ?></div></th>
					
				  </tr>
				  <tr>
					<th >Surname:</th>
					<th contenteditable='true'><div id="sn"><?php echo empty($row['surname'])? "-null-": $row['surname']; ?></div></th>
					
				  </tr>
				  <tr>
					<th>Your Address:</th>
					<th contenteditable='true'><div id="ad"><?php echo empty($row['address'])? "-null-": $row['address']; ?></div></th>
				  </tr>
				  <tr>
					<th>Postcode:</th>
					<th contenteditable='true'><div id="pc"> <?php echo empty($row['postcode'])? "-null-": $row['postcode']; ?></div></th> 
					
				  </tr>
				  <tr>
					<th>Mobile Number</th>
					<th contenteditable='true'><div id="ph"><?php echo empty($row['phone'])? "0000": $row['phone']; ?></div></th>
					
				  </tr>
				  <tr>
					<th>Work/Home Number</th>
					<th contenteditable='true'><div id="an"><?php echo empty($row['altno'])? "0000": $row['altno']; ?></div></th>
					
				  </tr>
				  <tr>
					<th>Email Address:</th>
					<th contenteditable='true'><div id="em"><?php echo empty($row['email'])? "-null-": $row['email']; ?></div></th>
				   
				  </tr>
				  <tr>
					<th>Primary Source Of Heating</th>
					<th contenteditable='true'><div id="ft"><?php echo empty($row['fuel_type'])? "-null-": $row['fuel_type']; ?></div></th> 
					
				  </tr>
				    <tr>
					<th>How Old Is The Current Boiler?</th>
					<th>-null-</th>
					
				  </tr>
				  <tr>
					<th>Type Of Property</th>
					<th >-null-</th>
					
				  </tr>
				  <tr>
					<th>Your Property Built (Approximately)?</th>
					<th >-null-</th>
				   
				  </tr>
				<!--  <tr>
					<th>How Old Is The Current Boiler?</th>
					<th contenteditable='true'><div id="ba"></div></th>
					
				  </tr>
				  <tr>
					<th>Type Of Property</th>
					<th contenteditable='true'><div id="tp">Type Of Property </div></th>
					
				  </tr>
				  <tr>
					<th>Your Property Built (Approximately)?</th>
					<th contenteditable='true'><div id="pb">Property Built</div></th>
				   
				  </tr-->
				  <tr>
					<th>Select Insulation Type Required</th>
					<th contenteditable='true'><div id="wit"><?php echo empty($row['wall_insulation_type'])? "-null-": $row['wall_insulation_type']; ?></div></th> 
					
				  </tr>
				  <tr>
					<th>Number Of Bedrooms</th>
					<th contenteditable='true'><div id="rit"><?php echo empty($row['roof_insulation_type'])? "-null-": $row['roof_insulation_type']; ?></div></th>
					
				  </tr>
				  <tr>
					<th>Owner Or Tenant</th>
					<th contenteditable='true'><div id="ow"><?php  echo empty($row['owner'])? "-null-": $row['owner']; ?></div></th>
				  </tr>
				  <tr>
					<th>Benefits Received (By Occupier)</th>
					<th contenteditable='true'> <div id="be"><?php echo empty($row['benefits'])? "No Benefits - NO": $row['benefits']; ?></th>
				  </tr>
				  <tr>
					<th>Lead Source</th>
					<th><?php echo $row['created_by']; ?></th>
				  </tr>
<?php 
//$res_event = mysqli_query($conn, "select * from events where id = ".$row['ID'].";");
if ($row['status_code']=='INST')
{
				  echo "<tr><th>Installation Time</th>";
					echo "<th>";
					echo $row['start'];
					echo"</th></tr>";
				  
}
if ($row['status_code']=='ASMT')
{
				  echo "<tr><th>Assesment Time</th>";
					echo "<th>";
					echo $row['start'];
					echo"</th></tr>";
				  
}
if ($row['status_code']=='REM')
{
				  echo "<tr><th>Reminder Time</th>";
					echo "<th>";
					echo $row['start'];
					echo"</th></tr>";
				  
}
?>

				 
				

				   </table>
<div align="center" >

    
    <th colspan="2"  ><h5  >Notes</h5></th>
  
<textarea class="textarea"  rows="6" cols="80">
</textarea>
</div>
<br>

<!-- Div for reminder Popup Starts -->
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">

<form action="update_lead_reminder.php" id="form" method="post" name="form">
<img id="close" src="img/cross.png" onclick ="div_hide()">
<h1>Set Reminder</h1>
<hr>

<input type="date" id="name" name="rem_date" placeholder="Tour Date (Format: Month/Day/Year)" class="datepicker" >

<select name="rem_time">
        <option value="00" disabled selected>
		-- Select Time --
		</option>
		<option value="12:00 AM">12:00AM</option><option value="12:15 AM">12:15AM</option><option value="12:30 AM">12:30AM</option><option value="12:45 AM">12:45AM</option>
		<option value="1:00 AM">1:00AM</option><option value="1:15 AM">1:15AM</option><option value="1:30 AM">1:30AM</option><option value="1:45 AM">1:45AM</option>
	   <option value="2:00 AM">2:00AM</option><option value="2:15 AM">2:15AM</option><option value="2:30 AM">2:30AM</option><option value="2:45 AM">2:45AM</option>
	   <option value="3:00 AM">3:00AM</option><option value="3:15 AM">3:15AM</option><option value="3:30 AM">3:30AM</option><option value="3:45 AM">3:45AM</option>
	   <option value="4:00 AM">4:00AM</option><option value="4:15 AM">4:15AM</option><option value="4:30 AM">4:30AM</option><option value="4:45 AM">4:45AM</option>
	   <option value="5:00 AM">5:00AM</option><option value="5:15 AM">5:15AM</option><option value="5:30 AM">5:30AM</option><option value="5:45 AM">5:45AM</option>
	   <option value="6:00 AM">6:00AM</option><option value="6:15 AM">6:15AM</option><option value="6:30 AM">6:30AM</option><option value="6:45 AM">6:45AM</option>
       <option value="7:00 AM">7:00AM</option><option value="7:15 AM">7:15AM</option><option value="7:30 AM">7:30AM</option><option value="7:45 AM">7:45AM</option>
	   <option value="8:00 AM">8:00AM</option><option value="8:15 AM">8:15AM</option><option value="8:30 AM">8:30AM</option><option value="8:45 AM">8:45AM</option>
	   <option value="9:00 AM">9:00AM</option><option value="9:15 AM">9:15AM</option><option value="9:30 AM">9:30AM</option><option value="9:45 AM">9:45AM</option>
	   <option value="10:00 AM">10:00AM</option><option value="10:15 AM">10:15AM</option><option value="10:30 AM">10:30AM</option><option value="10:45 AM">10:45AM</option>
	   <option value="11:00 AM">11:00AM</option><option value="11:15 AM">11:15AM</option><option value="11:30 AM">11:30AM</option><option value="11:45 AM">11:45AM</option>
	   <option value="2:00 PM">12:00PM</option><option value="12:15 PM">12:15PM</option><option value="12:30 PM">12:30PM</option><option value="12:45 PM">12:45PM</option>
	   <option value="1:00 PM">1:00PM</option><option value="1:15 PM">1:15PM</option><option value="1:30 PM">1:30PM</option><option value="1:45 PM">1:45PM</option>
	   <option value="2:00 PM">2:00PM</option><option value="2:15 PM">2:15PM</option><option value="2:30 PM">2:30PM</option><option value="2:45 PM">2:45PM</option>
	   <option value="3:00 PM">3:00PM</option><option value="3:15 PM">3:15PM</option><option value="3:30 PM">3:30PM</option><option value="3:45 PM">3:45PM</option>
	   <option value="4:00 PM">4:00PM</option><option value="4:15 PM">4:15PM</option><option value="4:30 PM">4:30PM</option><option value="4:45 PM">4:45PM</option>
	   <option value="5:00 PM">5:00PM</option><option value="5:15 PM">5:15PM</option><option value="5:30 PM">5:30PM</option><option value="5:45 PM">5:45PM</option>
	   <option value="6:00 PM">6:00PM</option><option value="6:15 PM">6:15PM</option><option value="6:30 PM">6:30PM</option><option value="6:45 PM">6:45PM</option>
	   <option value="7:00 PM">7:00PM</option><option value="7:15 PM">7:15PM</option><option value="7:30 PM">7:30PM</option><option value="7:45 PM">7:45PM</option>
	   <option value="8:00 PM">8:00PM</option><option value="8:15 PM">8:15PM</option><option value="8:30 PM">8:30PM</option><option value="8:45 PM">8:45PM</option>
	   <option value="9:00 PM">9:00PM</option><option value="9:15 PM">9:15PM</option><option value="9:30 PM">9:30PM</option><option value="9:45 PM">9:45 PM</option>
	   <option value="10:00 PM">10:00PM</option><option value="10:15 PM">10:15PM</option><option value="10:30 PM">10:30PM</option><option value="10:45 PM">10:45PM</option>
	 <option  value="11:00 PM">11:00PM</option><option value="11:15 PM">11:15PM</option><option value="11:30 PM">11:30PM</option><option value="11:45 PM">11:45PM</option>
		
</select>
<textarea style="width:100%; height:150px;" id="msg" name="message" placeholder="Message"></textarea>
<input type="text" name="lead_id" value=<?php echo $var1?>>
<a href="javascript:%20check_empty()" id="submit"  name="submit" >Send</a>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
<!-- Div for reminder Popup Ends -->

				<div align="center">
				 <input id="send" type="button" name="save" value="save" onclick="saveLead(<?php echo $var1;?>)"/>
				 <input id="send" type="submit" value="Unable to Answer" onclick="changeleadstatus('UTA',<?php echo $var1;?>)" class="details-btns">
				 <input  id="send"type="submit" name="completed" onclick="changeleadstatus('COMP',<?php echo $var1;?>)" value="Completed" />
				 <input id="send" type="submit" value="Rejection" onclick="changeleadstatus('RJCT',<?php echo $var1;?>)" class="details-btns last-btn">
				 <input id="send" type="submit" name="remindersbtn" class="reminder-main-btn" value="Reminders"  onclick="div_show()"> 
				<br>
				 <?php 
					if ($v_role == 'ADMIN')
				 { ?>
				 <input id="send" type="submit" name="assesmentbtn" value="Assessment" id="assesment-btn-details" onclick="document.location = 'booking_cal.php?id=<?php echo $var1?>&status=ASMT';"/>
				 <input id="send" type="submit" name="installation" value="Installation" id="installation-btn-details" onclick="document.location = 'booking_cal.php?id=<?php echo $var1?>&status=INST';" />
				 <input id="send" type="submit" name="Qulified" onclick="changeleadstatus('QULI',<?php echo $var1;?>)" value="Qulified" />
				 <input id="send" type="submit" name="readey to book" onclick="changeleadstatus('RDTB',<?php echo $var1;?>)" value="readey to book" />
				 <input id="send" type="submit" value="delete" onClick="delete_lead(<?php echo $var1;?>)" >
				 <?php }?>
				 <br>
				 <input id="send" type="submit" name="Visit Completed" value="Visit Completed" onclick="changeleadstatus('VC',<?php echo $var1;?>)" >
				 <input  id="send"type="submit"  name="Reject After Ass."value="Reject After Ass." onclick="changeleadstatus('RAA',<?php echo $var1;?>)"  />
				 <input id="send" type="submit" name="Call back not ready" value="Call back not ready yet" onclick="changeleadstatus('CBNR',<?php echo $var1;?>)">
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
<script>

// Validating Empty Field
function check_empty() {
alert("Ready to submit form");
document.getElementById("form").submit();
alert("Form Submitted Successfully...");
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
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type = "text/javascript">
function changeleadstatus(status,lead_id) {
	var v_status=status;
	var v_lead_id=lead_id;
      $.ajax({
           type: "POST",
           url: 'change_lead_status.php',
		   data: { status: v_status, lead_id: v_lead_id },
           success:function(html) {
             alert(html);
           }

      });
 } 
 


function saveLead(lead_id){
	//alert ('i am starting');
	var v_lead_id=lead_id;
	var v_title = document.getElementById('title').innerHTML;
	//alert('title is' +v_title);
	var v_fname = document.getElementById('fn').innerHTML;
	//alert('fname is' +v_fname);
	var v_sname = document.getElementById('sn').innerHTML;
	//alert('v_sname is' +v_sname);
	 var v_address = document.getElementById('ad').innerHTML;
	// alert('address is' +v_address); 
	 var v_post_code = document.getElementById('pc').innerHTML;
	// alert('post_code is' +v_post_code);
	 var v_phone = document.getElementById('ph').innerHTML;
	 var v_aphone = document.getElementById('an').innerHTML;
	 //alert('aphone is' +v_aphone);
	 var v_email = document.getElementById('em').innerHTML;
	 var v_fuel_type = document.getElementById('ft').innerHTML;
	 if (v_fuel_type == '-null-')
	 { v_fuel_type = '';}
	 //var v_boiler = document.getElementById('ba').innerHTML;
	 //alert('boiler age is' +v_boiler);
	 //var v_property_type = document.getElementById('tp').innerHTML;
	 //var v_property_built = document.getElementById('pb').innerHTML;
	 var v_wall_ins = document.getElementById('wit').innerHTML;
	 // alert('wall is' +v_wall_ins);
	 var v_roof_ins = document.getElementById('rit').innerHTML;
	 //alert('roof is' +v_roof_ins);
	  //alert('boiler age is' +v_boiler);
	 var v_owner = document.getElementById('ow').innerHTML;
	  var v_benefits = document.getElementById('be').innerHTML;
    // alert('owner is' +v_owner); 
	//alert('address is' +document.getElementById('ad').innerHTML);
	//alert('post code is' +document.getElementById('pc').innerHTML);
	//alert('phone is' +document.getElementById('ph').innerHTML);
//	alert('number is' +document.getElementById('an').innerHTML);
	//alert('email is' +v_email);
	//alert('fuel_type is' +document.getElementById('ft').innerHTML);
	//alert('ba is' +document.getElementById('ba').innerHTML);
	//alert('tp is' +document.getElementById('tp').innerHTML);
	//alert('pb  is' +document.getElementById('pb').innerHTML);
	//alert('wit  is' +document.getElementById('wit').innerHTML);
	//data: {lead_id: v_lead_id, title: v_title,fname: v_fname, sname: v_sname,address: v_address, post_code: v_post_code, phone: v_phone ,aphone: v_aphone, email: v_email,fuel_type: v_fuel_type, boiler_age: v_boiler, type_of_property: v_property_type, wall_insulation_type: v_wall_ins, roof_insulation_type: v_roof_ins,owner: v_owner},
           
	  $.ajax({
           type: "POST",
           url: 'edit_lead_status.php',
		   data: {lead_id: v_lead_id, title: v_title,fname: v_fname, sname: v_sname,address: v_address, post_code: v_post_code, phone: v_phone ,aphone: v_aphone, email: v_email,fuel_type: v_fuel_type, wall_insulation_type: v_wall_ins, roof_insulation_type: v_roof_ins,owner: v_owner,benefits:v_benefits},
           success:function(html) {
             alert(html);
           }

      });
}


</script> 
	<style>
	table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	
}
th, td {
    padding: 5px;
    text-align: left;
	font-family:'Raleway',sans-serif;
font-size:14px
}
table#t01 {
    width: 100%;    
    background-color: #f1f1c1;
}
.container {

	text-align: center;
	border: 1px solid green;
}
.container ul {
	border: 2px solid red;
	display: inline-block;
	margin: 10px 0;
	padding: 2px;
}
.container li {
	display: inline-block;
}
.container li a {
	display: inline-block;
	background: #444;
	color: #FFF;
	padding: 5px;
	text-decoration: none;
}
#send {
width:10%;
height:35px;
margin-top:10px;
border-radius:3px;
background-color:#0000cc;
border:1px solid #fff;
color:#fff;
font-family:'Raleway',sans-serif;
font-size:12px
}
#sd {
width:100%;
height:30px;
text-align:center;


background-color:#0000cc;
border:1px solid #fff;
color:#fff;
font-family:'Raleway',sans-serif;
font-size:22px
}
#s {
width:55%;
height:55px;
margin-top:5px;
border-radius:3px;
background-color:#0000cc;
border:1px solid #fff;
color:#fff;
font-family:'Raleway',sans-serif;
font-size:22px
}
#submit {
	display: inline-block;
	background: #0000cc;
	color: #FFF;
	padding: 5px;
	text-decoration: none;
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
form {
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
input {
width:100%;
margin-bottom:20px;
padding:10px;
height:30px;
box-shadow:1px 1px 12px gray;
border-radius:3px;
border:1px solid #ccc;
}
input[type=date] {
width:40%;
padding:10px;
margin-top:30px;
border:1px solid #ccc;
padding-left:40px;
font-size:16px;
font-family:raleway
}


textarea1 {
background-image:url(../apexgree/img/cross.png);
background-repeat:no-repeat;
background-position:5px 7px;
width:82%;
height:95px;
padding:10px;
resize:none;
margin-top:30px;
border:1px solid #ccc;
padding-left:40px;
font-size:16px;
font-family:raleway;
margin-bottom:30px
}
#submit {
text-decoration:none;
width:100%;
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
span {
color:red;
font-weight:700
}
button {
width:10%;
height:45px;
border-radius:3px;
background-color:#cd853f;
color:#fff;
font-family:'Raleway',sans-serif;
font-size:18px;
cursor:pointer
}
select {
background-image:url(../images/arrow.png);
background-repeat:no-repeat;
background-position:300px;
width:40%;
padding:12px;
margin-top:8px;

line-height:1;
border-radius:5px;
background-color:#fff;
border:1px solid #ccc;
font-size:16px;
-webkit-appearance:none;

outline:none
}

</style> 