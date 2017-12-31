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

<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	
}

td, th {
    border: 1px solid #eeeee;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
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
				
				$v_query="SELECT lse.start,lse.id,i.postcode FROM lead_status_event lse, insulations i WHERE i.ID=lse.id and lse.status_code='ASMT' and MONTH(lse.start) = '$v_month' and YEAR(lse.start)='$year_var'";
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