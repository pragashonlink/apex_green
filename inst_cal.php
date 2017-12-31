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

td, th {
    border: 1px solid #eee;
    text-align: center;
    padding: 1px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
#button {
width:5%;
height:15px;
margin-top:5px;
padding: 1px;
border-radius:3px;
background-color:#0000cc;
border:1px solid #fff;
color:#fff;
font-family:'Raleway',sans-serif;
font-size:14px
}
</style>

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
		 
               
                
                    <?php
                   
					?>
                    <div class="clear">
                    </div>
					
                
			   
            <div class="box round first">
              
				 
                <div class="block">
                    <div id="employee_table">
		<?php

include_once("db_connection.php");
?>


<?php

include_once("db_connection.php");
?>


<?php

$year = (isset($_GET['year'])) ? $_GET['year'] : date("Y");
$week = (isset($_GET['week'])) ? $_GET['week'] : date('W');

$v_id = $_GET['id'];
$v_status = $_GET['status'];

/* print 'middle year = '. $year;
echo '<br>';
print 'middle week = '. $week;
echo '<br>';
print 'middle id = '. $v_id;
echo '<br>';
print 'middle status = '. $v_status;
echo '<br>'; */

//if($week > 52) {
  //  $year++;
    //$week = 1;
	//echo 'add year'; 
//} elseif($week < 1) {
  //  $year--;
    //$week = 52;
	//echo 'reduce year'; 
	
//}
/* print 'after year = '. $year;
echo '<br>';
print 'after week = '. $week;
echo '<br>'; */
?>


<body>
	<table border='1' style='border-collapse:collapse;' align="center">
	<tr>
		<td align="center">
			<a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week == 1 ? 52 : $week -1).'&year='.($week == 1 ? $year - 1 : $year); ?>">Pre Week</a> <!--Previous week-->
		</td>
		<td colspan='6' align="center">
			<?php 
				//print 'print year = '. $year;
				//print 'print week = '. $week;
				$week_var=$week;
				$year_var=$year;
				if($week_var < 10) {
					$week_var = '0'. $week_var;
				}
				$var_d = strtotime($year_var ."W". $week_var . $day);
				//echo "time= ". $var_d;
				//echo "<td>". date('l', $var_d) ."<br>". date('d M', $var_d) ."</td>";
				echo date('F Y', $var_d); 
				
				$v_month = date('m', $var_d); 
				
				$v_query="SELECT lse.start,lse.id,i.postcode FROM lead_status_event lse, insulations i WHERE i.ID=lse.id and lse.status_code='INST' and MONTH(lse.start) = '$v_month' and YEAR(lse.start)='$year_var'";
				//echo $v_query;
				$res_event = mysqli_query($conn, $v_query);
				//echo mysqli_num_rows($res_event);
			?>
		</td>
		<td>
			<a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week == 52 ? 1 : 1 + $week).'&year='.($week == 52 ? 1 + $year : $year); ?>">Next  Week</a> <!--Next week-->
		</td>
	</tr>
	



		<tr>
			<td>Time Slot</td>
		<?php
				$week_var1=$week;
				$year_var1=$year;
				
				if($week_var1 < 10) {
					$week_var1 = '0'. $week_var1;
				}
				
	for($day= 1; $day <= 7; $day++) {
		$d = strtotime($year_var1 ."W". $week_var1 . $day);
		//echo "time1 = ". $d;
		//echo '<br>';
		echo "<td>". date('l', $d) ."<br>". date('d M', $d) ."</td>";
	}
	
		echo '</tr>';
		$time_cnt='7:00';
		for($col_cnt = 1; $col_cnt <= 11; $col_cnt++){ 
		
		echo '<tr>';
		echo '<td>';
		$timestamp = strtotime($time_cnt) + 3600 * $col_cnt;
		echo date('h:i A', $timestamp);
		
		//echo 'Time';
		echo '</td>';
			for($dayin= 1; $dayin <= 7; $dayin++){
				
		echo '<td>';

				$week_var2=$week;
				$year_var2=$year;
						
				if($week_var2 < 10) {
							$week_var2 = '0'. $week_var2;
						}
				$d2 = strtotime($year_var2 ."W". $week_var2 . $dayin);
				$d3 = $d2 + 3600 * (7+$col_cnt); //Added hour factor
				//echo 'd3= ' . $d3;// 
				//echo 'd3 f' . date('d-m-Y H:i:s', $d3 );
				
				// Loop to check the data time with current time
				while($row=mysqli_fetch_array($res_event))
				{ 
					$v_data_time = strtotime($row["start"]);
					//echo '<BR>Here ' . $v_data_time . ' ' . date('d-m-Y  H:i:s', $v_data_time);
					//echo '<BR>D3 ' . $d3. ' ' . date('d-m-Y  H:i:s', $d3);
					if ($v_data_time == $d3)
					{
						//echo 'book1 &nbsp&nbsp'; echo $row["id"];
						$var_book1_match = $row["id"];
						$var_book1_post = $row["postcode"];
				
					//echo "<input type='button' name='Book1' value='".$row["id"]."' style='width:59px; height:25px;  background-color: red'/>&nbsp;&nbsp;";
					}
					
					if ($v_data_time == $d3+900)
					{
						//echo 'book2 &nbsp&nbsp';  echo $row["id"];
						$var_book2_match = $row["id"];
						$var_book2_post = $row["postcode"];
					}
					
					if ($v_data_time == $d3+1800)
					{
						//echo 'book3';  echo $row["id"];
						$var_book3_match = $row["id"];
						$var_book3_post = $row["postcode"];
					}
					
					if ($v_data_time == $d3+2700)
					{
						//echo 'book4';  echo $row["id"];
						$var_book4_match = $row["id"];
						$var_book4_post = $row["postcode"];
					}
				}//end of while loop
				
			mysqli_data_seek($res_event, 0); //reset pointer
			
			if (empty($var_book1_match) and $var_book1_match==0 )
			{
				//echo 'Book1 not' . $var_book1_match;?>
				<input type='button' name='Book1' onclick="book_assesment('<?php echo date('Y-m-d', $d2) ?>','<?php echo date('H', $timestamp) ?>',1,'<?php echo $v_status ?>','<?php echo $v_id ?>')" value='Book1' style='width:50px; height:25px;  background-color: #99ccff'/>&nbsp;&nbsp;
			<?php
			}
			else
			{
				//echo 'Book1  ' . $var_book1_match;
			?>
				<input type='button' name='Book1' onclick="document.location = 'lead_details.php?id=<?php echo $var_book1_match?>'" value='<?php echo $var_book1_post?>' style='width:50px; height:25px;  background-color: yellow'/>&nbsp;&nbsp;
			
			<?php
				$var_book1_match = 0;
			}
				//if (empty($var_book2_match))
			if(empty($var_book2_match) and $var_book2_match==0 )
			{
			?>
				<input type='button' name='Book2' onclick="book_assesment('<?php echo date('Y-m-d', $d2) ?>','<?php echo date('H', $timestamp) ?>',2,'<?php echo $v_status ?>','<?php echo $v_id ?>')" value='Book2' style='width:50px; height:25px;  background-color: #99ccff'/><BR>
			<?php
			}
			else
			{
			?>
				<input type='button' name='Book2' onclick="document.location = 'lead_details.php?id=<?php echo $var_book2_match?>'" value='<?php echo $var_book2_post?>' style='width:50px; height:25px;  background-color: yellow'/>&nbsp;&nbsp;
			<?php

				$var_book2_match=0;
			}
			if(empty($var_book3_match) and $var_book3_match==0 )
			{	
			?>
				<input type='button' name='Book3' onclick="book_assesment('<?php echo date('Y-m-d', $d2) ?>','<?php echo date('H', $timestamp) ?>',3,'<?php echo $v_status ?>','<?php echo $v_id ?>')" value='Book3' style='width:50px; height:25px;  background-color: #99ccff'/>&nbsp;&nbsp;
			<?php
			}
			else
			{
				//echo 'book3';  echo $row["id"];
			?>
				<input type='button' name='Book3' onclick="document.location = 'lead_details.php?id=<?php echo $var_book3_match?>'" value='<?php echo $var_book3_post?>' style='width:50px; height:25px;  background-color: yellow'/>&nbsp;&nbsp;
			<?php
				$var_book3_match=0;
			}
				//if (empty($var_book4_match))
			if(empty($var_book4_match) and $var_book4_match==0 )
			{
			?>
				<input type='button' name='Book4' onclick="book_assesment('<?php echo date('Y-m-d', $d2) ?>','<?php echo date('H', $timestamp) ?>',4,'<?php echo $v_status ?>','<?php echo $v_id ?>')" value='Book4' style='width:50px; height:25px;  background-color: #99ccff'/>
			<?php
			}
			else
			{
			?>
				<input type='button' name='Book4' onclick="document.location = 'lead_details.php?id=<?php echo $var_book4_match?>'" value='<?php echo $var_book4_post?>' style='width:50px; height:25px;  background-color: yellow'/>&nbsp;&nbsp;
			<?php

				$var_book4_match=0;
			}
			?>
				
		</td>
			
			<?php } ?>
		</tr>
		<?php
	}?>
	</table>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type = "text/javascript">
function book_assesment(p_date,p_time,p_book, p_status, p_lead_id) {
	v_date=p_date;
	v_status=p_status;
	v_lead_id=p_lead_id;
	
	if (p_book == '1')
	{ v_time = p_time + ':00:00';
		}

	if (p_book == '2')
	{ v_time = p_time + ':15:00';
		}

	if (p_book == '3')
	{ v_time = p_time + ':30:00';
		}

	if (p_book == '4')
	{ v_time = p_time + ':45:00';
		}
	v_date_time=v_date + ' ' +v_time;
	//window.location='update_lead_setup.php?status='+v_status+'&lead_id='+v_lead_id+'&date_time='+v_date_time;
	$.ajax({
           type: "POST",
           url: 'update_lead_setup.php',
		   data: { status: v_status, lead_id: v_lead_id, date_time: v_date_time },
           success: function(v) {
			   alert (v);
			   window.location='lead_details.php?id='+v_lead_id;
           }
      });
 }     

</script> 


            
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
dfjgkdgj
        </p>
    </div>
	
</body>
<!-- Body Ends Here -->

</html>
<script>
$(document).ready(function(){
	$('#create_excel').click(function(){
		var excel_data = $('#employee_table').html();
		var page = "excel.php?data=" + excel_data;
		alert('I am here');
		window.location=page;
	});
	
});
</script>
