<?php
	include_once("db_connection.php");
	 ?>
<header class="page-head">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
	$( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "",
          changeMonth: true,
          numberOfMonths: 2
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 2
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
		});
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
	} );
</script>

<form class="search-form" form id="form" action=""  method="post" name="form">
<SELECT class="option-box" size=1 style="font-family: Arial;" name="status" id="status" > 
	<option value="" selected>
	<?php if (isset($_POST['status']) and !is_null($_POST['status']) and !empty($_POST['status'])) 
			{ 	$var_sts=$_POST['status'];
				$res = mysqli_query($conn, "SELECT * FROM installation_status where status_code = '$var_sts'");
				while($row=mysqli_fetch_array($res)){
				echo $row['status_desc'] ;
				}
			} 
			else 
			{
				echo '--Select Status-- ';
			} 
	?>
		 </option>
			<?php 
			$res = mysqli_query($conn, "SELECT * FROM installation_status ");
			while ($row = $res->fetch_assoc()){
			?>
			<option value="<?php echo $row['status_code']; ?>"><?php echo $row['status_desc']; ?></option>

			<?php
			// close while loop 
			}
			?>
         </select> 
	 
		 
	<SELECT class="option-box" size=1 style="font-family: Arial;" name="lead_source" id="lead_source">
	<option value="" selected> 
	<?php if (isset($_POST['lead_source']) and !is_null($_POST['lead_source']) and !empty($_POST['lead_source'])) { echo $_POST['lead_source'] ;} else {echo '--Select Lead Source-- ';} ?>
		
			<?php 
			$res = mysqli_query($conn, "SELECT * FROM lead_source where active_flag='y'");
			while ($row = $res->fetch_assoc()){
			?>
			<option value="<?php echo $row['source_name']; ?>"><?php echo $row['source_name']; ?></option>

			<?php
			// close while loop 
			}
			?>
	</SELECT>
<SELECT class="option-box" size=1 style="font-family: Arial;" name="site_details" id="site_details">
	<option value="" selected> 
	<?php if (isset($_POST['site_details']) and !is_null($_POST['site_details']) and !empty($_POST['site_details'])) { echo $_POST['site_details'] ;} else {echo '--Select Project-- ';} ?>
		
			<?php 
			$res = mysqli_query($conn, "SELECT * FROM site_details where active_flag='Y'");
			while ($row = $res->fetch_assoc()){
			?>
			<option value="<?php echo $row['id']; ?>"><?php echo $row['display_name']; ?></option>

			<?php
			// close while loop 
			}
			?>
	</SELECT> 	
	
	 
<br>
	<SELECT onchange="pickandshow(this.value)" class="option-box" size=1 name="date_search" style="font-family: Arial;"id="date_search">
        <!--<OPTION value="" selected>-->
		<?php if (isset($_POST['date_search']) and !is_null($_POST['date_search']) and !empty($_POST['date_search'])) 
		{$var_disp_date = $_POST['date_search'];
            if ($var_disp_date=='60days') {
                echo 'Last 60 days';
            }
			elseif ($var_disp_date=='today')
			{ echo 'Today';
			}
			elseif ($var_disp_date=='yesterday'){
				echo 'Yesterday';
			}
			elseif ($var_disp_date=='7days'){
				echo 'Last 7 Days';
			}
			elseif ($var_disp_date=='curr_month'){
				echo 'This Month ';
			}
			elseif ($var_disp_date=='prev_month'){
				echo 'Last Month';
			}
			elseif ($var_disp_date=='curr_year'){
				echo 'This Year';
			}
			elseif ($var_disp_date=='prev_year'){
				echo 'Last Year';
			}
			elseif ($var_disp_date=='all_time'){
				echo 'All Time';
			}
			elseif ($var_disp_date=='custom'){
				echo 'Custom Date';
				echo "<script> document.getElementById('customDate').style.display = 'block'; </script>";
			}
			
		} 
		/*else {
			echo '-- Select Date --'; 
			}*/;?>
        <OPTION value="60days" selected>Last 60 days</OPTION>
        <OPTION value="today">Today</OPTION>
		<OPTION value="yesterday">Yesterday</OPTION>
		<OPTION value="7days">Last 7 Days</OPTION>
		<OPTION value="curr_month">This Month </OPTION>
		<OPTION value="prev_month">Last Month</OPTION>
        <option value="40days">40 days</option>
		<OPTION value="curr_year">This Year</OPTION>
		<OPTION value="prev_year">Last Year</OPTION>
		<OPTION value="all_time">All Time</OPTION>
		<OPTION value="custom">Custom Date</OPTION>
	</SELECT>

 	<SELECT class="option-box" size=1 style="font-family: Arial;" name="fuel_type" id="fuel_type"> <OPTION value="" 
		selected><?php if (isset($_POST['fuel_type']) and !is_null($_POST['fuel_type']) and !empty($_POST['fuel_type'])) { echo $_POST['fuel_type'] ;} else {echo '--Select Fuel Type-- ';} ?>
		<option value="Main Gas">Mains Gas</option>
		<option value="Oil">Oil</option>
		<option value="LPG">LPG</option>
		<option value="ElectricStorageHeater">Electric Storage Heater</option>
		<option value="no_central_heating_system">Other</option>
	</SELECT> 

	<SELECT class="option-box" size=1  style="font-family: Arial;" name="insulation_type" id="insulation_type"> 
		<OPTION value="" selected><?php if (isset($_POST['insulation_type']) and !is_null($_POST['insulation_type']) and !empty($_POST['insulation_type']) ) {echo $_POST['insulation_type'];} else {echo '--Select Insulation Type-- ';}?> 
		<option  value="Cavity Walls + Loft Insulation">Cavity Walls &amp; Loft Insulation </option>
		<option  value="Cavity Walls Insulation">Cavity Walls Insulation </option>
		<option  value="Loft Insulation">Loft Insulation</option>
		<option  value="Solid Walls Insulation">Solid Walls Insulation</option>
	</SELECT> 

	<SELECT class="option-box" size=1 style="font-family: Arial;" name="benefits" id="benefits"> <OPTION value="" 
		selected> 
		<?php 
				if (isset($_POST['benefits']) and !empty($_POST['benefits']))
				{
					$v_benefits=$_POST['benefits'];
					if ($v_benefits=='Yes')
					{
							echo $v_benefits;
					  }
					if ($v_benefits=='No')
					{
						echo $v_benefits;
						}
				}
				else{
					echo '- Select Benefits -';
				}
		?>
		<option value="Yes">Benifit Receive
		<option value="No"> No Benifit Receive
	</SELECT>  
  
	<input type="text" placeholder="Keyword" name="Keyword"  id="Keyword" class="option-box" value="<?php if (isset($_POST['Keyword']) and !is_null($_POST['Keyword']) and !empty($_POST['Keyword'])) {echo $_POST['Keyword']; } ?>">
	<input  type="submit" id="send" value="Search" class="option-box" size=1 name="Search" /><br>
	<div id="customDate" style="display:<?php echo ((!empty($_POST['date_search']) AND $_POST['date_search']=='custom' )?block:none)?>;">
		<label for="from"  class="option-box"">From</label>
		<input type="text" id="from" name="from">
		<label for="to" class="option-box"">To</label>
		<input type="text" id="to" name="to">
	</div>
 
</form>
</header>
<script type="text/javascript">

document.getElementById('date_search').value = "<?php echo $_POST['date_search'];?>";
document.getElementById('fuel_type').value = "<?php echo $_POST['fuel_type'];?>";
document.getElementById('insulation_type').value = "<?php echo $_POST['insulation_type'];?>";
document.getElementById('benefits').value = "<?php echo $_POST['benefits'];?>";
document.getElementById('Keyword').value = "<?php echo $_POST['Keyword'];?>";

 function pickandshow(selectedValue) {
	if (selectedValue == 'custom' ) {
		document.getElementById('customDate').style.display = "block";
	}
	else {
	    document.getElementById('customDate').style.display = "none";
	}
  }
</script>
<style>
html {
  font-family: Arial;
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;   
}
.page-head {
  display: flex;  
  align-items: left;  /* Makes the nav items and logo appear vertically centered with the search box*/
  margin: .5rem;
}

.logo {
  /* Prevent logo from shrinking 
     so it doesn't collide when window gets narrow. */
  flex-shrink: 0;
}

.search-form {
  margin: 0 1rem;  
  flex-grow: 1; /* <-- THE SECRET SAUCE! */
  min-width: 28rem;
}

.search-box {
  width: 15%; 
  
  padding: .4rem;
  background-color: white;
}
.option-box {
  width: 15%; 
  
  padding: .4rem;
  background-color: white;
}

.site-nav > ul {
  display: flex;
  margin: 0;
  
.site-nav__item {  
  /* Prevent nav items from shrinking 
     so they won't collide when window gets narrow. */
  flex-shrink: 0;
   width: 100%;  
  padding: .4rem;
  background-color: #ffb;

  list-style-type: none;
  margin: 0 .55rem;
  cursor: pointer;
  /* Prevent multi-word nav items from wrapping. */
  white-space: nowrap;  
}
</style>
<?php
				include_once("db_connection.php");
				//echo "hello1";
				//print_r($_POST);
				
				if ($_POST['Search']){
				
				// for keyword search
				if (isset($_POST['Keyword']) and !is_null($_POST['Keyword']) and !empty($_POST['Keyword'])) {
					//echo 'I am here' . $_POST['Keyword'];
				
                    $v_Keyword=$_POST['Keyword'];
                    $v_keword_str = " select i.ID, Date_format(i.insert_time,'%d-%m-%Y %r') itime,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,i.notes,ifnull(lse.status_code,'NEW') status_code from insulations i left outer join lead_status_event lse on i.ID = lse.id where i.forename like '%$v_Keyword%' OR i.surname like '%$v_Keyword%' OR i.address like '%$v_Keyword%' OR i.postcode like '%$v_Keyword%' OR i.email like '%$v_Keyword%'OR i.phone like '%$v_Keyword%' OR i.lead_source like '%$v_Keyword%' order by id desc";
                    //echo $v_keword_str;
				}
				else
				{$v_keword_str = " ";}
				
				// for fuel type
				if (isset($_POST['fuel_type']) and !is_null($_POST['fuel_type']) and !empty($_POST['fuel_type']))
				{
					//echo 'I am here' . $_POST['fuel_type'];
				
				$v_fuel_type=$_POST['fuel_type'];
				$v_fuel_str=" AND i.fuel_type = '" .$v_fuel_type ."' ";
				}
				else
				{$v_fuel_str=' ';}
			// for Site group
				if (isset($_POST['site_details']) and !is_null($_POST['site_details']) and !empty($_POST['site_details']))
				{
					//echo 'I am here' . $_POST['fuel_type'];
				
				$v_site_source=$_POST['site_details'];
				$v_site_str=" AND i.siteID = '" .$v_site_source ."' ";
				}
				else
				{$v_site_str=' ';}
			
				// for lead source
				if (isset($_POST['lead_source']) and !is_null($_POST['lead_source']) and !empty($_POST['lead_source']))
				{
					//echo 'I am here' . $_POST['fuel_type'];
				
				$v_lead_source=$_POST['lead_source'];
				$v_lead_source_str=" AND i.lead_source = '" .$v_lead_source ."' ";
				}
				else
				{$v_lead_source_str=' ';}
			
				//For Status Check
				if (isset($_POST['status']) and !is_null($_POST['status']) and !empty($_POST['status']))
				{
					//echo 'I am here' . $_POST['fuel_type'];
				
				$v_lead_status=$_POST['status'];
				$v_lead_sts_str=" AND status_code = '" .$v_lead_status ."' ";
				}
				else
				{$v_lead_sts_str=' ';}
			
				// for wall insulation type
				if (isset($_POST['insulation_type']) and !is_null($_POST['insulation_type']) and !empty($_POST['insulation_type']) )
				{
					$v_insulation_type=$_POST['insulation_type'];
					$v_insulation_str = " AND i.wall_insulation_type = '" .$v_insulation_type ."' ";
				}
				else
				{$v_insulation_str = ' ';}
				
				// for benefits
				if (isset($_POST['benefits']) and !empty($_POST['benefits']))
				{
					$v_benefits=$_POST['benefits'];
					if ($v_benefits=='Yes')
					{ $v_ben_str=" AND benefits != 'No Benefits - NO' AND benefits != ' ' " ;
				      //$v_ben_str=" AND ifnull(benefits,'No Benefits - NO') != 'No Benefits - NO' ";
					  }
					if ($v_benefits=='No')
					{
						$v_ben_str=" AND benefits = 'No Benefits - NO' OR benefits = ' ' " ;
						//$v_ben_str=" AND ifnull(benefits,'No Benefits - NO') = 'No Benefits - NO' ";
						}
				}
				else
				{$v_ben_str=' ' ;}

				// for creation date search
			if (isset($_POST['date_search']) and !is_null($_POST['date_search']) and !empty($_POST['date_search']))
				{
					//echo 'I am here' . $_POST['fuel_type'];
				
				$v_date=$_POST['date_search'];
					if ($v_date == 'today'){
						$v_date_str = "  insert_time > DATE_SUB(NOW(), INTERVAL 1 DAY) ";
					}
					elseif ($v_date == 'yesterday'){
						$v_date_str = "  DATE(insert_time) = SUBDATE(CURRENT_DATE(), INTERVAL 1 DAY) ";
					}
					elseif ($v_date == '7days'){
						$v_date_str = "  insert_time > DATE_SUB(NOW(), INTERVAL 1 WEEK) ";
					}
					elseif ($v_date == 'curr_month'){
						$v_date_str = ' YEAR(insert_time) = YEAR(CURRENT_DATE()) AND MONTH(insert_time) = MONTH(CURRENT_DATE()) ';
						
					}
                    elseif ($v_date == '40days'){
                        $v_date_str = "  insert_time > DATE_SUB(NOW(), INTERVAL 40 DAY)  ";
                    }
                    elseif ($v_date == '60days'){
                        $v_date_str = "  insert_time > DATE_SUB(NOW(), INTERVAL 60 DAY)  ";
                    }
					elseif ($v_date == 'prev_month'){
						$v_date_str = ' YEAR(insert_time) = YEAR(CURRENT_DATE()) AND MONTH(insert_time) = MONTH(CURRENT_DATE()) -1 ';
					}
					elseif ($v_date == 'curr_year'){
						$v_date_str = ' YEAR(insert_time) = YEAR(CURRENT_DATE())';
					}
					elseif ($v_date == 'prev_year'){
						$v_date_str = ' YEAR(insert_time) = YEAR(CURRENT_DATE()) -1';
					}
					elseif ($v_date == 'all_time'){
						$v_date_str = ' 1=1 ';
					}
				}
				if (!empty($_POST['from']) and !empty($_POST['to']))
				{
					$v_from = $_POST['from'];
					$v_to = $_POST['to'];
					$v_date_str = " insert_time between str_to_date('$v_from','%m/%d/%Y')  and str_to_date('$v_to','%m/%d/%Y')";
				}
				
				if (empty($v_date_str))
				{$v_date_str = ' 1=1 ';}
				
				//if (!empty($v_keword_str) and !is_null($v_keword_str))
				if ($v_keword_str==" ")
				{
					//echo 'No 2';
					$search_query = "select * from (select i.ID, i.insert_time,i.lead_source,i.siteID,i.fuel_type,i.wall_insulation_type,benefits , Date_format(i.insert_time,'%d-%m-%Y %r') itime,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,i.notes,ifnull(lse.status_code,'NEW') status_code from insulations i left outer join lead_status_event lse on i.ID = lse.id) i where " . $v_date_str. " " .$v_lead_sts_str. " " . $v_lead_source_str. " " . $v_site_str. " " .$v_fuel_str." " .$v_insulation_str." " .$v_ben_str. " order by id desc";
				}
				else 	
				{$search_query = $v_keword_str;  
				//echo 'No 1'
				}

				//echo $search_query;
			}
				
			?>