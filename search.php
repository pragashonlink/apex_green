<?php
	include_once("db_connection.php");

  //Status check
  if (isset($_GET['status']) && !is_null($_GET['status']) && !empty($_GET['status']))
  {
      $v_lead_status = $_GET['status'];
  }

  //For Status Check
  if (isset($_POST['status']) and !is_null($_POST['status']) and !empty($_POST['status']))
  {
      $v_lead_status=$_POST['status'];
  }
  else
  {
      $v_lead_sts_str=' ';
  }

?>

<header class="page-head">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
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

<form class="search-form" form id="search-form" action=""  method="post" name="form">
<SELECT class="option-box" size=1 style="font-family: Arial;" name="status" id="status" >
    <option value=""> -- Select Status -- </option>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM installation_status ");
        while ($row = $res->fetch_assoc()){
        ?>
        <option value="<?php echo $row['status_code']; ?>" <?php echo ($v_lead_status === $row["status_code"]) ? 'selected' : '' ?> ><?php echo $row['status_desc']; ?></option>

        <?php
        // close while loop
        }
        ?>
 </select>
	 
		 
	<SELECT class="option-box" size=1 style="font-family: Arial;" name="lead_source" id="lead_source">
        <option value=""> -- Select Job Source -- </option>
			<?php 
			$res = mysqli_query($conn, "SELECT * FROM lead_source where active_flag='y'");
			while ($row = $res->fetch_assoc()){
			?>
			<option value="<?php echo $row['source_name']; ?>" <?php echo (isset($_POST['lead_source']) && $_POST['lead_source'] === $row["source_name"]) ? 'selected' : '' ?> ><?php echo $row['source_name']; ?></option>

			<?php
			// close while loop 
			}
			?>
	</SELECT>
<SELECT class="option-box" size=1 style="font-family: Arial;" name="site_details" id="site_details">
    <option value=""> -- Select Site -- </option>
	<?php
        $res = mysqli_query($conn, "SELECT * FROM site_details where active_flag='Y'");
        while ($row = $res->fetch_assoc()){
        ?>
        <option value="<?php echo $row['id']; ?>" <?php echo (isset($_POST['site_details']) && $_POST['site_details'] === $row["id"]) ? 'selected' : '' ?> ><?php echo $row['display_name']; ?></option>
        <?php
        // close while loop
        }
    ?>
</SELECT>

    <div style="width: 300px; display: inline-block; margin: 8px 0.55rem; vertical-align: middle">
        <div class="input-daterange input-group" id="datepicker">
            <span class="input-group-addon">From</span>
            <input type="text" class="input-sm form-control" name="from" value="<?php echo (isset($_POST['from']) && !empty($_POST['from'])) ? $_POST['from'] : '' ?>"/>
            <span class="input-group-addon">to</span>
            <input type="text" class="input-sm form-control" name="to"  value="<?php echo (isset($_POST['to']) && !empty($_POST['to'])) ? $_POST['to'] : '' ?>"/>
        </div>
    </div>

	<select class="option-box" name="date_search" style="font-family: Arial;" id="date_search" autocomplete="off">
        <option value="" hidden> -- Select Date -- </option>
        <option value="90days" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === '90days') ? 'selected' : 'selected' ?> >Last 90 days</option>
        <option value="60days" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === '60days') ? 'selected' : '' ?> >Last 60 days</option>
        <option value="today" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === 'today') ? 'selected' : '' ?> >Today</option>
		<option value="yesterday" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === 'yesterday') ? 'selected' : '' ?> >Yesterday</option>
		<option value="7days" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === '7days') ? 'selected' : '' ?> >Last 7 Days</option>
		<option value="14days" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === '14days') ? 'selected' : '' ?> >Last 14 Days</option>
		<option value="curr_month" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === 'curr_month') ? 'selected' : '' ?> >This Month </option>
		<option value="prev_month" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === 'prev_month') ? 'selected' : '' ?> >Last Month</option>
        <option value="30days" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === '30days') ? 'selected' : '' ?> >Last 30 Days</option>
        <option value="40days" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === '40days') ? 'selected' : '' ?> >40 days</option>
		<option value="curr_year" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === 'curr_year') ? 'selected' : '' ?> >This Year</option>
		<option value="prev_year" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === 'prev_year') ? 'selected' : '' ?> >Last Year</option>
		<option value="all_time" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === 'all_time') ? 'selected' : '' ?> >All Time</option>
		<option value="custom" <?php echo (isset($_POST['date_search']) && $_POST['date_search'] === 'custom') ? 'selected' : '' ?> >Custom Date</option>
	</select>

 	<SELECT class="option-box" size=1 style="font-family: Arial;" name="fuel_type" id="fuel_type">
        <option value=""> -- Select Fuel Type -- </option>
		<option value="Main Gas" <?php echo (isset($_POST['fuel_type']) && $_POST['fuel_type'] === 'Main Gas') ? 'selected' : '' ?> >Mains Gas</option>
		<option value="Oil" <?php echo (isset($_POST['fuel_type']) && $_POST['fuel_type'] === 'Oil') ? 'selected' : '' ?> >Oil</option>
		<option value="LPG" <?php echo (isset($_POST['fuel_type']) && $_POST['fuel_type'] === 'LPG') ? 'selected' : '' ?> >LPG</option>
		<option value="ElectricStorageHeater" <?php echo (isset($_POST['fuel_type']) && $_POST['fuel_type'] === 'ElectricStorageHeater') ? 'selected' : '' ?> >Electric Storage Heater</option>
		<option value="no_central_heating_system" <?php echo (isset($_POST['fuel_type']) && $_POST['fuel_type'] === 'no_central_heating_system') ? 'selected' : '' ?> >Other</option>
	</SELECT> 

	<SELECT class="option-box" size=1  style="font-family: Arial;" name="insulation_type" id="insulation_type">
        <option value=""> -- Select Insulation Type -- </option>
		<option  value="Cavity Walls + Loft Insulation" <?php echo (isset($_POST['insulation_type']) && $_POST['insulation_type'] === 'Cavity Walls + Loft Insulation') ? 'selected' : '' ?>>Cavity Walls &amp; Loft Insulation </option>
		<option  value="Cavity Walls Insulation" <?php echo (isset($_POST['insulation_type']) && $_POST['insulation_type'] === 'Cavity Walls Insulation') ? 'selected' : '' ?>>Cavity Walls Insulation </option>
		<option  value="Loft Insulation" <?php echo (isset($_POST['insulation_type']) && $_POST['insulation_type'] === 'Loft Insulation') ? 'selected' : '' ?>>Loft Insulation</option>
		<option  value="Solid Walls Insulation" <?php echo (isset($_POST['insulation_type']) && $_POST['insulation_type'] === 'Solid Walls Insulation') ? 'selected' : '' ?>>Solid Walls Insulation</option>
	</SELECT> 

	<select class="option-box" size=1 style="font-family: Arial;" name="benefits" id="benefits">
        <option value=""> -- Receive Benefits? -- </option>
        <option value="Yes" <?php echo (isset($_POST['benefits']) && $_POST['benefits'] === 'Yes') ? 'selected' : '' ?>>Benifit Receive</option>
        <option value="No" <?php echo (isset($_POST['benefits']) && $_POST['benefits'] === 'No') ? 'selected' : '' ?>> No Benifit Receive</option>
	</select>
  
	<input type="text" placeholder="Keyword" name="Keyword"  id="Keyword" class="option-box" value="<?php if (isset($_POST['Keyword']) and !is_null($_POST['Keyword']) and !empty($_POST['Keyword'])) {echo $_POST['Keyword']; } ?>">

    <input  type="submit" id="send" value="Search" class="option-box" style="margin-top: 0;" size=1 name="Search" /><br>

 
</form>
</header>
<script type="text/javascript">

document.getElementById('date_search').value = "<?php echo (isset($_POST['date_search']))? $_POST['date_search'] : '';?>";
document.getElementById('fuel_type').value = "<?php echo (isset($_POST['fuel_type']))? $_POST['fuel_type'] : ''; ?>";
document.getElementById('insulation_type').value = "<?php echo (isset($_POST['insulation_type']))? $_POST['insulation_type'] : '';?>";
document.getElementById('benefits').value = "<?php echo (isset($_POST['benefits']))? $_POST['benefits'] : '';?>";
document.getElementById('Keyword').value = "<?php echo (isset($_POST['Keyword']))? $_POST['Keyword'] : '';?>";
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
				

				
			?>

