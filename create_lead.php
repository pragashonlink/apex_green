<?php
session_start();
$v_role=$_SESSION["role"];
//if ($v_role == 'ADMIN') $var_admin='ADMIN';
// echo "i am out";
//echo $_SESSION["role"];
if (!isset($_SESSION["role"])&&(($_SESSION["role"]<>'ADMIN') ))
{
    echo "i am in";
    echo $_SESSION["role"];
    header("Location: login.php");
}
	include_once("db_connection.php");
  $benefits = array();
  $employment_support = "";
  $universal_credit = "";
  $income_based = "";

  $job_seeker = "";
  $support = "";
  $tax_credit = "";
  $working_tax_credit = "";
  
  // print_r($_SESSION);
  // echo 'Sample data';
  
  #print_r
  #$_SESSION['benefits']);
  
  # print
  # $_SESSION['postcode'];
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
	<style>
	table {
    border: 1px solid black;
    border-collapse: collapse;
	
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 {
    width: 100%;    
    background-color: #f1f1c1;
}

</style> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.js"> </script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#benefits_income_related').change(function() {
        $('#mycheckboxdiv').toggle();
    
  });   
    });

  $(document).ready(function() {
    var benefits_income_related6 = $("#benefits_income_related6").is(':checked');

    if (benefits_income_related6) {
      $('#mycheckboxdiv6').show();
    }
    
    var benefits_income_related7 = $("#benefits_income_related7").is(':checked');

    if (benefits_income_related7) {
      $('#mycheckboxdiv7').show();
    }
    
    var benefits_income_related8 = $("#benefits_income_related8").is(':checked');

    if (benefits_income_related8) {
      $('#mycheckboxdiv8').show();
    }
    
    var benefits_income_related2 = $("#benefits_income_related2").is(':checked');

    if (benefits_income_related2) {
      $('#mycheckboxdiv2').show();
    }
    
    var benefits_income_related4 = $("#benefits_income_related4").is(':checked');

    if (benefits_income_related4) {
      $('#mycheckboxdiv4').show();
    }
    
    var benefits_income_related5 = $("#benefits_income_related5").is(':checked');

    if (benefits_income_related5) {
      $('#mycheckboxdiv5').show();
    }
  });

  $(document).ready(function() {
    $('#benefits_income_related2').change(function() {
        $('#mycheckboxdiv2').toggle();
    
      $('#benefits6').attr('checked', false);
    }); 
    }); 
  
    $(document).ready(function() {
    $('#benefits_income_related3').change(function() {
        $('#mycheckboxdiv3').toggle();
    
      $('#benefits6').attr('checked', false);
  });   
    }); 
  
    $(document).ready(function() {
    $('#benefits_income_related4').change(function() {
        $('#mycheckboxdiv4').toggle();
    
    
      $('#benefits6').attr('checked', false);
    }); 
    });
  
    $(document).ready(function() {
    $('#benefits_income_related5').change(function() {
        $('#mycheckboxdiv5').toggle();
    
    
      $('#benefits6').attr('checked', false);
    }); 
    });
  
  
    $(document).ready(function() {
    $('#benefits_income_related6').change(function() {
        $('#mycheckboxdiv6').toggle();
    
    
      $('#benefits6').attr('checked', false);
    }); 
    });
  
     $(document).ready(function() {
    $('#benefits_income_related7').change(function() {
        $('#mycheckboxdiv7').toggle();
    
    
      $('#benefits6').attr('checked', false);
    }); 
    });
  
        $(document).ready(function() {
    $('#benefits_income_related8').change(function() {
        $('#mycheckboxdiv8').toggle();
    
    
      $('#benefits6').attr('checked', false);
    }); 
    });
  
</script>
<script type="text/javascript">
  function validate_page() {
    $("#dv_error").hide();
  
    var retVal = true;
  
    var owner = $("#owner option:selected" ).val();
  
    if (owner === '') {
      $("#dv_error").show();
      $("#dv_error").html('Please Select owenership');
      retVal = false;
    }

    if (retVal) {
      $( "#form1" ).submit();
    }
  }
  
  function set_employment_support(v) {
    var employment_support = $("#employment_support").val();

    if (employment_support.length == 0) {
      var employment_supports = []
    }
    else {
      var employment_supports = employment_support.split(',');
    }

    employment_supports.push(v);
  
    // $("#employment_support").val(employment_supports.join("Income-Related Employment Support Allowance::"));
    $("#employment_support").val(employment_supports.join(', '));
  }
  
  function set_job_seekers(v) {
    var job_seeker = $("#job_seekers").val();

    if (job_seeker.length == 0) {
      var job_seekers = []
    }
    else {
      var job_seekers = job_seeker.split(',');
    }

    job_seekers.push(v);
  
    // $("#job_seekers").val(job_seekers.join("::Jobseekers Allowance::"));
    $("#job_seekers").val(job_seekers.join(", "));
  }
  
  function set_income_support(v) {
    var income_support = $("#support").val();

    if (income_support.length == 0) {
      var income_supports = []
    }
    else {
      var income_supports = income_support.split(',');
    }
    
    income_supports.push(v);
  
    // $("#support").val(income_supports.join("::Working Tax Credit::"));
    $("#support").val(income_supports.join(", "));
  }
  
  function set_tax_credit(v) {
    var tax_credit = $("#opt_tax_credit").val();

    if (tax_credit.length == 0) {
      var tax_credits = []
    }
    else {
      var tax_credits = tax_credit.split(', ');
    }
    
    tax_credits.push(v);
  
    // $("#tax_credit").val(tax_credits.join('Child Tax Credit (household income below £15,850)::'));
    $("#tax_credit").val(tax_credits.join(', '));
  }

  function set_universal_credit(v) {
    var universal_credit = $("#universal_credit").val();

    if (universal_credit.length == 0) {
      var universal_credits = []
    }
    else {
      var universal_credits = universal_credit.split(', ');
    }
    
    universal_credits.push(v);
  
    // $("#universal_credit").val(universal_credits.join('Universl Tax Credit::'));
    $("#universal_credit").val(universal_credits.join(', '));
  }

 

 function set_income_based(v) {
    var income_based = $("#income_based").val();

    if (income_based.length == 0) {
      var income_baseds = []
    }
    else {
      var income_baseds = income_based.split(', ');
    }

    income_baseds.push(v);
  
    // $("#income_based").val(income_baseds.join('::Income-Based Jobseekers Allowance::'));
    $("#income_based").val(income_baseds.join(', '));
  }



 function set_working_tax(v) {
    var working_tax_credit = $("#working_tax_credit").val();

    if (working_tax_credit.length == 0) {
      var working_tax_credits = []
    }
    else {
      var working_tax_credits = working_tax_credit.split(', ');
    }
    
    working_tax_credits.push(v);
  
    // $("#working_tax_credit").val(working_tax_credits.join('::Working Tax Credit::'));
    $("#working_tax_credit").val(working_tax_credits.join(', '));
  }



 function set_pension_credit(v) {
    var tax_credit = $("#pension_credit").val();

    if (tax_credit.length == 0) {
      var tax_credits = []
    }
    else {
      var tax_credits = tax_credit.split(', ');
    }

    tax_credits.push(v);
  
    // $("#pension_credit").val(tax_credits.join('Pension Credit (top-up to state pension)::'));
    $("#pension_credit").val(tax_credits.join(', '));
  }


 
 
  function reset_benefits() {
    $("#no_support").val('NO');

    var benefits6 = $("#benefits6").is(':checked');
    
    if (benefits6) {
      $('#benefits2').attr('checked', false);
      $('#benefits').attr('checked', false);
      $('#benefits_income_related').attr('checked', false);
      $('#benefits_income_related2').attr('checked', false);
      $('#benefits_income_related3').attr('checked', false);
      $('#benefits_income_related4').attr('checked', false);
      $('#benefits_income_related5').attr('checked', false);
      $('#benefits_income_related6').attr('checked', false);
      $('#benefits_income_related7').attr('checked', false);
      $('#benefits_income_related8').attr('checked', false);

      $('#mycheckboxdiv2').hide();
      $('#mycheckboxdiv3').hide();
      $('#mycheckboxdiv4').hide();
      $('#mycheckboxdiv5').hide();
      $('#mycheckboxdiv6').hide();
      $('#mycheckboxdiv7').hide();
      $('#mycheckboxdiv8').hide();

      $('#tax_credit').attr('checked', false);
      $('#i_receive').attr('checked', false);
      $('#i_receive_esa').attr('checked', false);
      $('#have_universal_credit').attr('checked', false);
      $('#incomeBasedJobseekersAllowance_childUnder16').attr('checked', false);
      $('#incomeBasedJobseekersAllowance_childUnder20InFullTimeEducation').attr('checked', false);
      $('#incomBasedJobseekersAllowance_childTaxCreditIncludingADisabilityElement').attr('checked', false);
      $('#incomeBasedJobseekersAllowance_disabledChildPremium').attr('checked', false);
      $('#incomeBasedJobseekersAllowance_disabilityPremium').attr('checked', false);
      $('#incomeBasedJobseekersAllowance_pensionPremium').attr('checked', false);
      $('#incomeBasedJobseekersAllowance_none').attr('checked', false);

      $('#incomeBasedJobseekersAllowance_childUnder16').attr('checked', false);
      $('#incomeBasedJobseekersAllowance_childUnder20InFullTimeEducation').attr('checked', false);
      $('#benefits_income_related3').attr('checked', false);
      $('#Severe_Disability_Element').attr('checked', false);
      $('#Disabled_Worker_Element').attr('checked', false);
      $('#Aged_60_Or_Over').attr('checked', false);
      $('#incomeBasedJobseekersAllowance_none').attr('checked', false);      
    }
  
  }
  
</script> 
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupDashboardChart('chart1');
            setupLeftMenu();
			setSidebarHeight();


        });
    </script>
	<script type="text/javascript">
         <!--
            // Form validation code will come here.
         //-->
		 
		  function validateForm()
			{
                 var x=document.contact_form.Name.value;
				 if( x == "" )
				 {
					alert( "Please enter Name!" );
					document.contact_form.Name.focus() ;
					return false;
				 }
				 
				  var x=document.contact_form.surname.value;
				 if( x == "" )
				 {
					alert( "Please enter surname!" );
					document.contact_form.Name.focus() ;
					return false;
				 }	 
				   var x=document.contact_form.telNumber.value;
				 if( x == "" )
				 {
					alert( "Please enter telNumber!" );
					document.contact_form.Name.focus() ;
					return false;
				 }
				   var x=document.contact_form.email.value;
				 if( x == "" )
				 {
					alert( "Please enter email!" );
					document.contact_form.Name.focus() ;
					return false;
					}
				 var x=document.contact_form.country.value;
				 if( x == "" )
				 {
					alert( "Please enter Country name!" );
					document.contact_form.Name.focus() ;
					return false;
				 }
				  var x=document.contact_form.tour.value;
				 if( x == "" )
				 {
					alert( "Please select A service !" );
					document.contact_form.Name.focus() ;
					return false;
				 }
				  var x=document.contact_form.numberPassengers.value;
				 if( x == "" )
				 {
					alert( "Please select number of passengers!" );
					document.contact_form.Name.focus() ;
					return false;
				 }
				 
				
				 var x=document.contact_form.tourDate.value;
				 if( x == "" )
				 {
					alert( "Please select Tour Date!" );
					document.contact_form.Name.focus() ;
					return false;
				 }
				 
				
			}
      </script>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <!--<img src="img/logo.png" alt="Logo" />-->
					<font color="#FFFFFF" style="font-size:20px ">	
									Apexgreen
					</font>
					</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Admin</li>
                            
                            <li><a href="#">Logout</a></li>
                        </ul>
                        <br />
                        <span class="small grey"></span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
       <!-- <div class="grid_12">
            
        </div>-->
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
            <div class="box round first">
			<div class="grid_12">
            
		
                
				 <div>
				
				 </div>
                <div class="block">
				<div class="right_col" role="main">
  <div class="">
    
    <div class="clearfix"></div>
    <div class="row center-class-for-comp-form">
      <div class="col-md-12 col-sm-12 col-xs-12">
                <!---->
        <div class="x_panel comp-form-all" >
          <div class="x_content" style="border:1px solid #0000cc; padding:0; background-color:#f5f5f5">
            <div class="x_title heading-for-comp-form" >
            	<h2 class="" style="display:block; width:100%;">Compete Your Form </h2>
            	<div class="clearfix"></div>
          </div>
                 
     <form name="form" method="post"  action="create_lead_action.php">
    <div>              
    </div><br><br> 
   
   
				<h5>Please Enter Your Details Below To Receive A Free Assessment</h5><br><br>
      <div class="basic-info-comp-form">
              <!-- Reservation Title -->
                   <div class="comp-form-label-input-wraper">
                   		<label>Title</label>
                      <select class="form-control comp-form-select-option" name="title" required>
                      	<option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Ms">Ms</option>
                        <option value="Miss">Miss</option>
                        <option value="Dr">Dr</option>
                        <option value="Prof">Prof</option>
                      </select>
					</div>
	   
       
       <!-- first-name -->
                   <div class="comp-form-label-input-wraper no-margin">
                   		<label>First Name</label>
                      	<input type="text" name="firstname"  required=""/>
					</div>
                    <!-- first name end -->
        <!-- surname end -->
                   <div class="comp-form-label-input-wraper">
                   		<label>Surname</label>
                      	<input type="text" name="surname" />
					</div>
                    <!-- surname end -->
					 <!-- address  -->
                   <div class="comp-form-label-input-wraper no-margin">
                   		<label>Your Address</label>
                      	<input type="text" name="address"  required=""/>
					</div>
                    <!-- address end -->
       <!-- postcode -->
                   <div class="comp-form-label-input-wraper">
                   		<label>Postcode</label>
                      	<input type="text" name="postcode"  required="" />
					</div>
                    <!-- postcode end -->
					  <!-- email address -->
                   <div class="comp-form-label-input-wraper no-margin">
                   		<label>Email Address</label>
                      	<input type="email" name="email" required="" />
					</div>
                    <!-- email address end -->
					 <!-- work no -->
                   <div class="comp-form-label-input-wraper">
                   		<label>Work/Home Number</label>
                      	<input type="tel" name="altno" />
					</div>
                    <!-- work no end -->
					<!-- mob no  -->
                   <div class="comp-form-label-input-wraper no-margin">
                   		<label>Mobile Number</label>
                      	<input type="tel" name="mobile" required="" />
					</div>
                    <!-- mob no end -->
        </div>
		<div class="requirement-comp-form"><br><br>
		<h5>Please Tell Us About Your Circumstances To See The Level Of Funding Available.</h5><br><br>
	  <!-- psoh = primery source of heating -->
                 	<div class="comp-form-label-input-wraper">
                   		<label>Primary Source Of Heating</label>
                      <select  required="" class="form-control comp-form-select-option" name="fuel_type">
                      	<option value="">Please Select...</option>
                        <option value="Main Gas">Mains Gas</option>
                        <option value="Oil">Oil</option>
                        <option value="LPG">LPG</option>
                        <option value="ElectricStorageHeater">Electric Storage Heater</option>
                        <option value="no_central_heating_system">Other</option>
                      </select>
					</div>
                    <!-- primery source of heating end -->
				
			 <!--  how old is the current boiler -->
                    <div class="comp-form-label-input-wraper no-margin">
                   		<label>How Old Is The Current Boiler?</label>
                      <select  required="" class="form-control comp-form-select-option" name="boiler_age">
                      	<option value="">Please Select</option>
                        <option value="More Than 8 Years Old">More Than 8 Years Old</option>
                        <option value="Less Than 8 Years Old">Less Than 8 Years Old</option>
                      </select>
					</div>
                    <!-- how old is the current boiler end -->
				  <!--Type Of Property  -->
                    <div class="comp-form-label-input-wraper">
                   		<label>Type Of Property</label>
                      <select required class="form-control comp-form-select-option" name="type_of_property">
					  	<option value="">Please Select</option>
                      <option  value="Detached House">Detached House </option>
<option  value="Semi Detached House">Semi Detached House</option>
<option  value="Flat Maisonette">End Terrace House </option>
<option  value="End Terrace House">Mid Terrace House</option>
<option  value="Detached Bungalow ">Detached Bungalow</option>
<option  value="Semi Detached Bungalow">Semi Detached Bungalow </option>
<option  value="Flat/Maisonette">Flat/Maisonette</option>
<option  value="Other">Other</option>
                      </select>
					</div>
					
                    <!--  Type Of Property end -->
	  <!-- Your Property Built (Approximately)?  -->
                    <div class="comp-form-label-input-wraper no-margin">
                   		<label>Your Property Built (Approximately)?</label>
                      <select required class="form-control comp-form-select-option" name="property_built">
                      	<option value="">Please Select</option>
                        <option value="Between 1900-1925">Between 1900-1925</option>
                        <option value="Between 1926-1982">Between 1926-1982</option>
                        <option value="Between 1983-Now">Between 1983-Now</option>
                      </select>
					</div>
                    <!-- Your Property Built (Approximately)? end -->
				 <!--Select Wall Insulation Type -->
                    <div class="comp-form-label-input-wraper">
                   		<label>Select Wall Insulation Type</label>
                      <select required class="form-control comp-form-select-option" name="wall_insulation_type">
                      	<option value="">Please Select</option>
                       <option  value="Cavity Walls + Loft Insulation">Cavity Walls &amp; Loft Insulation </option>
<option  value="Cavity Walls Insulation">Cavity Walls Insulation </option>
<option  value="Loft Insulation">Loft Insulation</option>
<option  value="Solid Walls Insulation">Solid Walls Insulation</option>
                      </select>
					</div>
		             <!-- Select Wall Insulation Type end -->
				 <!-- Select Loft/Roof Insulation Type-->
                     <div class="comp-form-label-input-wraper no-margin">
                   		<label>  Number of Bedrooms</label>
                      <select required class="form-control comp-form-select-option" name="roof_insulation_type">
                      	<option value="">Please Select</option>
                        <option  value=">1 Bedroom">1 Bedroom</option> 
                <option  value="2 Bedrooms">2 Bedrooms</option>  
                  <option  value="3 Bedrooms">3 Bedrooms</option> 
                    <option  value="4 Bedrooms">4 Bedrooms</option> 
                      <option  value="5 Bedrooms">5 Bedrooms</option>   
                        <option  value="6 Bedrooms">6 Bedrooms</option>
                      </select>
					</div>
					
					
					
					
                    <!--Select Loft/Roof Insulation Type end -->
				</div>
				<div class="sircumstances-all"><br><br>
				<h5>Please Tell Us About Your Circumstances To See The Level Of Funding Available.</h5><br><br>
				<!-- Primary Source Of Heating 2 -->
                    <div class="comp-form-label-input-wraper full-width-comp-form">
                   		<label>Owner or Tenant </label>
                      <select class="form-control comp-form-select-option" name="owner" required>
                      	<option value="">Please Select</option>
                        <option value="Home Owner">Home Owner</option>
                        <option value="Private Tenant">Private Tenant</option>
                        <option value="Council Tenant">Council Tenant</option>
                        <option value="Housing Association">Housing Association</option>
                        <option value="Landlord">Landlord</option>
                      </select>
					</div>
					
                    <!--Primary Source Of Heating 2 end --><br><br>
<span>Benefits Received (By Occupier)</span>
<div class="comp-form-label-check-box main-checkbox">

                  <?php

                    $child_tax = array_search('child_tax', $benefits);
                    $show_div_child_tax = $child_tax != "" ? '' : 'display: none;';

                  ?>

                  <label>Child Tax Credit (household income below &pound;16,010)</label><input type="checkbox" <?php echo array_search('child_tax', $benefits) != "" ? "checked='checked'" : '' ?> value="child_tax" id="benefits_income_related6" name="benefits[]">
                  <div class="qualifying" id="mycheckboxdiv6" style="<?php echo $show_div_child_tax; ?>">
				  <h4>*Additional Component:</h4>
				  <div class="comp-fom-check-box-inner-div householdincome_Details">
                   
					<div class="comp-foem-label-check-box">
                    <label for="Ihavetakenornot">Total household income is LESS than £16,010 </label>
					</div>
					 <div class="clearfix"></div>
                    <input type="radio" id="opt_tax_credit" name="opt_tax_credit" value="Income_Less_Than_16K" onClick="set_tax_credit('Total household income is LESS than £16,010')">
                     <div class="comp-foem-label-check-box">    
                    <label for="IhaveNottaken">Total household income is MORE than £16,010 </label>
					</div>
					 <div class="clearfix"></div>
                    <input type="radio" id="opt_tax_credit" name="opt_tax_credit" value="Income_More_Than_16K" onClick="set_tax_credit('Total household income is MORE than £16,010')">
                                                            <br>          <br class=clear>     

                  </div>
				  </div>
				   </div>
 <div class="comp-form-label-check-box main-checkbox">
                  <?php

                    $pension_credit = array_search('pension_credit', $benefits);
                    $show_div_pension_credit = $pension_credit == "" ? 'display: none;' : '';

                  ?>

                  <br>
				  
                  <label>Pension Credit (top-up to state pension)</label><input type="checkbox" <?php echo array_search('pension_credit', $benefits) != "" ? "checked='checked'" : '' ?> value="pension_credit" id="benefits_income_related7" name="benefits[]">
                  <div class="qualifying" id="mycheckboxdiv7" style="<?php echo $show_div_pension_credit; ?>">
				  
				  <h4>*Additional Component:</h4>
				  <div class="comp-fom-check-box-inner-div pension_main_details">
                   
					 
					  <div class="comp-foem-label-check-box">
                    <label for="Ihavetakenornot">I receive a top-up in the form of pension credit</label>     
                    <input type="radio" id="i_receive" name="i_receive" value="TOP_UP" onClick="set_pension_credit('I receive a top-up in the form of pension credit')">
					</div>
                    <br>          <br>
					<div class="comp-foem-label-check-box">     
                    <label for="IhaveNottaken">I only receive state pension </label>
                    <input type="radio" id="i_receive" name="i_receive" value="STATE_PENSION" onClick="set_pension_credit('I only receive state pension')">
					</div>
                                        <br>          <br class=clear>     

                  </div>
				  </div>
				    </div>
					
				  
                  <!-- Income-Related Employment-->
 <div class="comp-form-label-check-box main-checkbox">
                  <?php

                    $income_related = array_search('income_related', $benefits);
                    $show_div_income_related = $income_related == "" ? 'display: none;' : '';

                  ?>

                  <br>
				
                  <label>Income-Related Employment Support Allowance</label><input type="checkbox" <?php echo array_search('income_related', $benefits) != "" ? "checked='checked'" : '' ?> value="income_related" id="benefits_income_related8" name="benefits[]"> 
 				
                  <div class="qualifying" id="mycheckboxdiv8" style="<?php echo $show_div_income_related; ?>">
				    
                    <h5>*Please note ESA must be income based not contribution based as confirmed on your award notice</h5>
                    <br> 
					
					 <div class="comp-fom-check-box-inner-div EmploymentAlloawnce_Main_details">
<div class="comp-foem-label-check-box">					
                    <label for="Ihavetakenornot">I receive income-based ESA</label>
                    <input type="radio" id="i_receive_esa" name="i_receive_esa" value="RECEIVE_ESA" onClick="set_employment_support('I receive income-based ESA')">
                    <br>          <br> </div>
<div class="comp-foem-label-check-box">					
                    <label for="IhaveNottaken">I receive contribution-based ESA</label>
                    <input type="radio" id="i_receive_esa" name="i_receive_esa" value="CONTRI_ESA" onClick="set_employment_support('I receive contribution-based ESA')">
                                            

                  
				   </div>
				    <br>          <br class=clear> 
				    </div>
					</div>
					</div>
				     
                  <!-- Income-Related Employment Ends-->
                  

                  <!-- Income-Based Jobseekers Allowance-->
<div class="comp-form-label-check-box main-checkbox">
                  <?php

                    $income_based = array_search('set_income_based', $benefits);
                    $show_div_income_based = $income_based == "" ? 'display: none;' : '';

                  ?> 
                  <br><label>Income-Based Jobseekers Allowance</label><input type="checkbox" <?php echo array_search('income_based_s', $benefits) != "" ? "checked='checked'" : '' ?> value="income_based_s" id="benefits_income_related2" name="benefits2">
                  <div class="qualifying" id="mycheckboxdiv2" style="<?php echo $show_div_income_based; ?>">
				  <h4>*Additional Component:</h4><br>
				  <div class="comp-fom-check-box-inner-div pension_main_details">
                    

					<div class="comp-foem-label-check-box"><label for="incomeBasedJobseekersAllowance_childUnder16">Child Under 16    </label>
                    <input type="checkbox" id="incomeBasedJobseekersAllowance_childUnder16" name="incomeBasedJobseekersAllowance_childUnder16" value="child_under_16," onClick="set_income_based('Child Under 16')">
					  </div>
                    <br><div class="comp-foem-label-check-box"><label for="incomeBasedJobseekersAllowance_childUnder20InFullTimeEducation">Child Under 20 In Full-Time Education (Not Uni)   </label>
                    <input type="checkbox" id="incomeBasedJobseekersAllowance_childUnder20InFullTimeEducation" name="incomeBasedJobseekersAllowance_childUnder20InFullTimeEducation" value="child_under_20_full_time_education," onClick="set_income_based('Child Under 20 In Full-Time Education - Not Uni)')">
					  </div>
                    <br><div class="comp-foem-label-check-box"><label for="incomBasedJobseekersAllowance_childTaxCreditIncludingADisabilityElement">Child Tax Credit Including A Disability Element  </label>
                    <input type="checkbox" id="incomBasedJobseekersAllowance_childTaxCreditIncludingADisabilityElement" name="incomBasedJobseekersAllowance_childTaxCreditIncludingADisabilityElement" value="child_tax_credit_including_disability_element," onClick="set_income_based('Child Tax Credit Including A Disability Element')">
					  </div>
                    <br><div class="comp-foem-label-check-box"><label for="incomeBasedJobseekersAllowance_disabledChildPremium">Disabled Child Premium  </label>
                    <input type="checkbox" id="incomeBasedJobseekersAllowance_disabledChildPremium" name="incomeBasedJobseekersAllowance_disabledChildPremium" value="disabled_child_premium," onClick="set_income_based('Disabled Child Premium')">
					  </div>
                    <br><div class="comp-foem-label-check-box"><label for="incomeBasedJobseekersAllowance_disabilityPremium">Disability Premium  </label>  
                    <input type="checkbox" id="incomeBasedJobseekersAllowance_disabilityPremium" name="incomeBasedJobseekersAllowance_disabilityPremium" value="disability_premium," onClick="set_income_based('Disability Premium')">
					  </div>
                    <br><div class="comp-foem-label-check-box"><label for="incomeBasedJobseekersAllowance_pensionPremium">Pension Premium</label>  
                    <input type="checkbox" id="incomeBasedJobseekersAllowance_pensionPremium" name="incomeBasedJobseekersAllowance_pensionPremium" value="pension_premium," onClick="set_income_based('Pension Premium')">
					  </div>
                    <br><div class="comp-foem-label-check-box"><label for="incomeBasedJobseekersAllowance_none">None</label>
                    <input type="checkbox" id="incomeBasedJobseekersAllowance_none" name="incomeBasedJobseekersAllowance_none" value="none" onClick="set_income_based('none')">
                    <br class=clear>
                  </div>
 
  </div>
  </div>
  </div>

  
  
    

                                    <!-- Income-Based Jobseekers Allowance ends-->

                  <!--wORKING TAX CREDIT -->
<div class="comp-form-label-check-box main-checkbox">
                  <?php

                    $working_tax_credit = array_search('working_tax_credit', $benefits);
                    $show_div_working_credit = $working_tax_credit == "" ? 'display: none;' : '';

                  ?>

                  <br><label>Working Tax Credit (household income below &pound; 16,010 or less)</label><input type="checkbox" <?php echo array_search('working_tax', $benefits) != "" ? "checked='checked'" : '' ?> value="working_tax" id="benefits_income_related4" name="benefits4"><br>
                  <div class="qualifying" id="mycheckboxdiv4"  style="<?php echo $show_div_working_credit; ?>">
				  <h4>*Additional Component:</h4>
				  <div class="comp-fom-check-box-inner-div workingtaxcredit_Main_details">
                    
					<div class="comp-foem-label-check-box">
					<label for="incomeBasedJobseekersAllowance_childUnder16">Child Under 16    </label>
                    
                    <input type="checkbox" id="incomeBasedJobseekersAllowance_childUnder16" name="incomeBasedJobseekersAllowance_childUnder16," value="child_under_16" onClick="set_working_tax('Child Under 16')">
</div>
                    <br><div class="comp-foem-label-check-box"><label for="incomeBasedJobseekersAllowance_childUnder20InFullTimeEducation">Child Under 20 In Full-Time Education (Not Uni)   </label>
                   
                    <input type="checkbox" id="incomeBasedJobseekersAllowance_childUnder20InFullTimeEducation" name="incomeBasedJobseekersAllowance_childUnder20InFullTimeEducation" value="child_under_20_full_time_education," onClick="set_working_tax('Child Under 20 In Full-Time Education-  Not Uni')">
                 </div> <br>
				  <div class="comp-foem-label-check-box"><label for="Severe_Disability_Element">Income Support </label>
                    <input type="checkbox" id="Income Support" name="Severe_Disability_Element" value="Income Support" onClick="set_working_tax('Income Support')">

</div>
                               <br>
							   <div class="comp-foem-label-check-box"><label for="Severe_Disability_Element">Severe Disability Element  </label>
                    <input type="checkbox" id="Severe_Disability_Element" name="Severe_Disability_Element" value="severe_disability_element" onClick="set_working_tax('Severe_Disability_Element')">
                   </div> <br>
					<div class="comp-foem-label-check-box"><label for="Disabled_Worker_Element">Disabled Worker Element </label>
                    <input type="checkbox" id="Disabled_Worker_Element" name="Disabled_Worker_Element" value="disabled_worker_element" onClick="set_working_tax('Disabled_Worker_Element')">
                   </div> <br>
				   <div class="comp-foem-label-check-box">
					<label for="Aged_60_Or_Over">Aged 60 Or Over</label>
                    <input type="checkbox" id="Aged_60_Or_Over" name="Aged_60_Or_Over" value="aged_60_or_over" onClick="set_working_tax('Aged_60_Or_Over')">
                   </div> <br>
				   <div class="comp-foem-label-check-box">
					<label for="incomeBasedJobseekersAllowance_none">None</label>
                    <input type="checkbox" id="incomeBasedJobseekersAllowance_none" name="incomeBasedJobseekersAllowance_none" value="none" onClick="set_working_tax('none')">
                        
<br class=clear>
                  </div>
                      </div> 
 </div>					  <!-- wORKING TAX CREDIT Ends-->
 </div>

<div class="comp-form-label-check-box main-checkbox">
<!--Universal tax credit begins -->
                  <?php

                    $universal_credit = array_search('universal_credit', $benefits);
                    $show_div_qualifying = $universal_credit == "" ? 'display: none;' : '';

                  ?>

                  <label>Universal Credit</label><input type="checkbox" <?php echo $universal_credit != "" ? "checked='checked'" : '' ?> value="universal_credit" id="benefits_income_related5" name="benefits5"><br>     
                  <div class="qualifying" id="mycheckboxdiv5"  style="<?php echo $show_div_qualifying; ?>" >
				 
                    <h4>*Additional Component:</h4>
					 <div class="comp-fom-check-box-inner-div unversalcredit_Main_details">
<div class="comp-foem-label-check-box">
                    <label for="Ihavetakenornot">Whilst being in receipt of Universal Credit, I have received a monthly take-home pay amount of £1250 or less in any period within the last 12 months.   </label>
                    <input type="radio" id="have_universal_credit" name="have_universal_credit" value="Ireceive" onClick="set_universal_credit('I have received a monthly take-home pay amount of £1250 or less in any period within the last 12 months.')">
                    <br>          <br>                         <br>          <br>  </div>    
<div class="comp-foem-label-check-box">
                    <label for="IhaveNottaken">Whilst being in receipt of Universal Credit, I have NOT received a monthly take-home pay amount of £1250 or less in any period within the last 12 months.    </label>
                    <input type="radio" id="have_universal_credit" name="have_universal_credit" value="IhaveNottaken" onClick="set_universal_credit('I have NOT received a monthly take-home pay amount of £1250 or less in any period within the last 12 months.')">
                  
<br class=clear>
                  </div>
				   </div>
				   </div>
 </div>


				<!-- Universal tax credit ends-->

				<div class="comp-form-label-check-box">
					<label><b>I do not receive one of the above benefits</b></label><input type="checkbox" <?php echo array_search('none', $benefits) != "" ? "checked='checked'" : '' ?> value="none" id="benefits6" name="benefits5" onClick="reset_benefits();">
				</div>
				  
					  
         <div class="submit-comp-form">
		 <label>Job Source</label>
		  <select required class="form-control comp-form-select-option" name="lead_source" style="border:1px solid #0000cc;background:#fff;float:right;color:#333;padding-left:10px;padding-right:10px;width:50%;box-sizing:border-box;margin-right:10px;">
		  <option value="" selected> Select Job Source </option>
			<?php 
			$res = mysqli_query($conn, "SELECT source_name FROM lead_source where active_flag='y'");
			while ($row = $res->fetch_assoc()){
			?>
			<option value="<?php echo $row['source_name']; ?>"><?php echo $row['source_name']; ?></option>

			<?php
			// close while loop 
			}
			?>
         </select>

         <input type="submit" value="submit" name="submit" />
		 </div>
		 
</div>

    </form>

		</div>
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
       
    </div>
</body>
</html>
<script>
					$(function(){
  $('input[name=featured_ad]').change(function(){
     if(!$(this).is(":checked"))
       $("input[name=ad_pack_id]").removeProp("checked");
     else
        $("input[name=ad_pack_id]:first").prop("checked",true);
  });

  $('input[name=ad_pack_id]').click(function(){
      $('input[name=featured_ad]').prop("checked",true); 
  });
});
</script>
<style>
 @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');
 .center-class-for-comp-form {
	 margin:auto;
	 text-align:center;
 }
 .comp-form-all {
	 max-width:740px;
	 margin:auto;
	 float:none;
	 padding:0;
}
.heading-for-comp-form {
	padding:0;
	margin:auto;
	border:none;
}
.heading-for-comp-form h2 {
	padding:15px 0;
	background-color:#0000cc;
	color:#ffffff;
	font-size:24px;
	font-weight:normal;
	text-align:center;
	width:100%:
    font-family: 'Montserrat', sans-serif;
	margin:auto;
}
.form-for-comp p, .form-for-comp span, .comp-form-label-input-wraper label {
	margin:15px auto 16px;
    font-family: 'Montserrat', sans-serif;
	font-size:16px;
	line-height:24px;
	color:#333333;
	text-align:left;
}
.comp-form-label-input-wraper label  {
	margin:0px 0 5px;
}
.form-for-comp span {
	color:#0000cc;
	display:block;
}
.basic-info-comp-form {
	padding-bottom:10px;
}
.form-for-comp {
	width:100%;
	padding:10px;
}
.comp-form-label-input-wraper {
	width:41%;
	margin-right:13%;
	display:inline-block;
	margin-bottom:18px;
}
/* css for comp-form-select-option 
.comp-form-label-input-wraper:nth-child(2n) {
	margin-right:0;
}*/
.comp-form-select-option {
	padding:10px;
	   appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
	text-decoration:none; 
	border:1px solid #0000cc;
	width:100%;
	position:relative;
	background:url(images/sort_desc_disabled.png) no-repeat right 10px center;
	min-height:40px;
	background-color:#ffffff;
}
.comp-form-label-input-wraper label {
	display:block;
}
.comp-form-label-input-wraper input {
	width:100%;
	border:1px solid #0000cc;
	min-height:40px;
	background-color:#ffffff;
}
/* last form*/
.full-width-comp-form {
	width:96%;
	margin:auto;
	margin-bottom:25px;
}
/* css for the check boxes */
.comp-form-label-check-box label {
	display:inline-block;
	float:left;
    font-family: 'Montserrat', sans-serif;
	font-size:16px;
	line-height:24px;
	color:#333333;
	text-align:left;
	margin:0px 0 5px;
}
.comp-form-label-check-box {
	width:98%;
	margin-bottom:20px;
	margin-left:10px;
	display:block;
	margin-bottom:20px;
}
.comp-form-label-check-box > input[type="checkbox"] {
	float:right;
	display:inline-block;
	   appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
	outline:2px solid  #0000cc;
	border-radius:3px;
	padding:10px;
}
/*css for the submit-comp-form */
.submit-comp-form {
	margin-top:40px;
	text-align:center;
	margin-left:40px;
	margin-bottom:40px;
	color:#0000cc;
}
.submit-comp-form input {
	-webkit-appearance: none;
	background-color:#0000cc;
	color:#ffffff;
	border:none;
	padding:10px 0;
	display:block;
	min-width:190px;
}
.no-margin {
	margin-right:0;
}


/* css for the radio buttons appeared in the box */
.comp-fom-check-box-inner-div {
	width:90%;
	margin:15px auto;
	border:1px solid #0000cc;
	padding:10px;
}
.comp-fom-check-box-inner-div label {
	text-align:left;
	width:83%;
}
.comp-fom-check-box-inner-div input {
	float:right;
	width:15%;
}









</style>

