<?php
	include_once("db_connection.php");
	SESSION_START();

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

<!DOCTYPE html>

<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    
<script>
jQuery(document).ready(function(e) {
    var CheckDate = 'YES';
	jQuery.post("ajax-check-reminder.php",{CheckDate:CheckDate}, function(data){
		var variablesize = data.length;
		//alert(data);
		if(variablesize > 15){
			jQuery('.popups-footer-main-div').append(data);
		}
	});	
});
	
	
</script>

</head>





<body class="nav-md">



    <div class="container body">





        <div class="main_container">



<!-- /top navigation --><style>
.form-control{
	line-height: inherit;
}	
	
</style>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <!--<h3>Create New Lead</h3>-->
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row center-class-for-comp-form">
      <div class="col-md-12 col-sm-12 col-xs-12">
                <!---->
        <div class="x_panel comp-form-all" >
          <div class="x_content" style="border:1px solid #02a1ce; padding:0; background-color:#f5f5f5">
            <div class="x_title heading-for-comp-form" >
			
            	<h2 class="" style="display:block; width:100%;">Compete Your Form </h2>
            	<div class="clearfix"></div>
          </div>

            <form class="form-horizontal form-label-left form-for-comp" method="post" action="create_lead_sales_action.php">
				<input type="hidden" value="005" name="siteID"/>
				<span>Please Enter Your Details Below: </span>
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
               <!-- title end -->
               <!-- first-name -->
                   <div class="comp-form-label-input-wraper no-margin">
                   		<label>First Name</label>
                      	<input type="text" name="firstname""  required=""/>
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
                      	<input type="text"name="postcode"  required="" />
					</div>
                    <!-- postcode end -->
                   <!-- email address -->
                   <div class="comp-form-label-input-wraper no-margin">
                   		<label>Email Address</label>
                      	<input type="email" name="email"  required="" />
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
                 <div class="requirement-comp-form">
                <span>Please Tell Us About Your Circumstances To See The Level Of Funding Available.</span>
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
                      <select  required="" class="form-control comp-form-select-option"  name="boiler_age">
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
                      <select required class="form-control comp-form-select-option"name="wall_insulation_type">
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
                   		<label>Number of Bedrooms</label>
                      <select required class="form-control comp-form-select-option"name="roof_insulation_type">
                      	<option value="">Please Select</option>
                       <option  value=">1 Bedroom">1 Bedroom</option> 
                <option  value="2 Bedrooms">2 Bedrooms</option>  
                  <option  value="3 Bedrooms">3 Bedrooms</option> 
                    <option  value="4 Bedrooms">4 Bedrooms</option> 
                      <option  value="5 Bedrooms">5 Bedrooms</option>   
                        <option  value="6 Bedrooms">6 Bedrooms</option>
                      </select>
					</div>
					<div class="comp-form-label-input-wraper">
                   		<label>Benefits Received (By Occupier)</label>
                       <select class="form-control comp-form-select-option" name="benefits" required>
					  <option value="">Please Select</option>
                      	<option value="Yes">Yes</option>
                        <option value="NO">NO</option>
                      
                      </select>
					</div>
		             <!-- Select Wall Insulation Type end -->
                     <!-- Select Loft/Roof Insulation Type-->
                     <div class="comp-form-label-input-wraper no-margin">
                   		
						<label>Owner or Tenant</label>
						   <select class="form-control comp-form-select-option" name="owner" required>
							<option value="">Please Select</option>
							<option value="Home Owner">Home Owner</option>
							<option value="Private Tenant">Private Tenant</option>
							<option value="Council Tenant">Council Tenant</option>
							<option value="Housing Association">Housing Association</option>
							<option value="Landlord">Landlord</option>
						  </select>
						</div>
                    <!--Select Loft/Roof Insulation Type end -->
                    <!-- -->
					
				<span>Please Enter Your Cavity Walls/Loft Insulation Details.</span>
				<div class="basic-info-comp-form">
               
                    <!-- first name end -->
                    <!-- surname end -->
                   <div class="comp-form-label-input-wraper">
                   		<label>Charges Cavity Walls £</label>
                      	<input type="number" name="cavity_charges" />
					</div>
                    <!-- surname end -->
                    <!-- address  -->
                   <div class="comp-form-label-input-wraper no-margin">
				   	<label>Charges Loft Insulation £</label>
                      	<input  type="number" name="loft_charges"  required="" />
					</div>
                    <!-- address end -->
                    <!-- postcode -->
                   <div class="comp-form-label-input-wraper">
				   <label>Area Meter Sq. Cavity Walls  (m2)</label>
                      	<input type="number" name="cavity_area"  required=""/>
					</div>
                    <!-- postcode end -->
                   <!-- email address -->
                   <div class="comp-form-label-input-wraper no-margin">
                   			<label>Meter Sq. Area Loft Insulation (m2)</label>
                      	<input type="number" name="loft_area"  required="" />
					</div>
					<div class="comp-form-label-input-wraper">
					<label>Cavity Gap Or Depth (mm)</label>
                      	<input type="text" name="cavity_gap"  required="" />
					</div>
                    <!-- postcode end -->
                   <!-- email address -->
                   <div class="comp-form-label-input-wraper no-margin">
                   		<label>Existing Loft Insulation (mm)</label>
                      	<input  type="text" name="insu_required"  required="" />
					</div>
                    <!-- email address end -->
					
                    <!-- work no end -->
                    <!-- mob no  -->
                  
                    
                 </div>
                 <div class="sircumstances-all">
                 	
                   
                   <!-- Primary Source Of Heating 2 -->

                    <!--Primary Source Of Heating 2 end -->
                    <!-- check boxes -->
                    
                    	<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
					</div>
					<div class="submit-comp-form">
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
						<div style="clear: both;"></div>
                    </div>

                 </div>
              <div id="ReturnInformationDiv"> </div>
              
              <!-- Submit Form -->
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

	</div>

	<!-- /page content -->



</div>



    </div>

    <script>

        NProgress.done();

    </script>

    <!-- /datepicker -->

    <!-- /footer content -->

    

    <!-- form validation -->

	<script src="js/validator/validator.js"></script>

    <script>

        // initialize the validator function

        validator.message['date'] = 'not a real date';



        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':

        $('form')

            .on('blur', 'input[required], input.optional, select.required', validator.checkField)

            .on('change', 'select.required', validator.checkField)

            .on('keypress', 'input[required][pattern]', validator.keypress);



        $('.multi.required')

            .on('keyup blur', 'input', function () {

                validator.checkField.apply($(this).siblings().last()[0]);

            });



        // bind the validation to the form submit event

        //$('#send').click('submit');//.prop('disabled', true);



        /*$('form').submit(function (e) {

            e.preventDefault();

            var submit = true;

            // evaluate the form using generic validaing

            if (!validator.checkAll($(this))) {

                submit = false;

            }



            if (submit)

                this.submit();

            return false;

        });*/



        /* FOR DEMO ONLY */

        $('#vfields').change(function () {

            $('form').toggleClass('mode2');

        }).prop('checked', false);



        $('#alerts').change(function () {

            validator.defaults.alerts = (this.checked) ? false : true;

            if (this.checked)

                $('form .alert').remove();

        }).prop('checked', false);

    </script>











    

    

</body>



</html>

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
	background-color:#02a1ce;
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
	color:#02a1ce;
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
	width:43%;
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
	border:1px solid #02a1ce;
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
	border:1px solid #02a1ce;
	min-height:40px;
	background-color:#ffffff;
}
/* last form*/
.full-width-comp-form {
	width:100%;
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
	width:100%;
	margin-bottom:20px;
	display:block;
	margin-bottom:20px;
}
.comp-form-label-check-box > input[type="checkbox"] {
	float:right;
	display:inline-block;
	   appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
	outline:2px solid  #02a1ce;
	border-radius:3px;
	padding:10px;
}
/*css for the submit-comp-form */
.submit-comp-form {
	margin-top:40px;
	text-align:center;
	margin-left:0;
	color:#ffffff;
}
.submit-comp-form input {
	-webkit-appearance: none;
	background-color:#02a1ce;
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
	border:1px solid #02a1ce;
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
/* Smartphones ----------- */
@media only screen 
and (min-width : 320px) 
and (max-width : 480px) {
	 .comp-form-all {
	 max-width:100%;
	 margin:auto;
	 float:none;
	 padding:0;
}
.comp-form-label-input-wraper {
	width:100%;
	margin-right:0px;
	display:inline-block;
	margin-bottom:5px;
}	
	
.comp-form-select-option{
	width:100%;
	margin-right:0px;
	display:block;
	margin-bottom:15px;
}

	
	
	
	
	
	
	
	
	
	
	
	
}
</style>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.js"> </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#benefits_income_related').change(function() {
		  alert ('i am here');
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
		  alert ('go to show');
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
      $('#benefits_income_related5').click(function() {
          /*if(this.checked == true) {
              console.log('checked');
              $('#mycheckboxdiv5').show();
          } else {
              console.log('unchecked');
              $('#mycheckboxdiv5').hide();
          }
          console.log('clicked');
*/
      
      
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


    function togglePanel(panel) {
        if(panel) {
            $('#'+panel).toggle();
        }
    };

    function showPanel(panel) {
        if(panel) {
            $('#'+panel).show();
        }
    };

    function hidePanel(panel) {
        if(panel) {
            $('#'+panel).hide();
        }
    };

    function closeAllPanels() {
        $('.qualifying').hide();
    };

    $(document).ready(function(){
        /*var checkboxes = $('.option-checkbox');
        console.log(checkboxes);
        var divID;
        var multiple = false;
        if(checkboxes != '') {
            for(var i = 0; i < checkboxes.length; i++) {
                divID = $(this).next('.qualifying').attr('id');
                console.log(divID);
                $(this).change(function () {
                    if(divID != '') {
                        closeAllPanels();
                        togglePanel(divID);
                    }
                    checkboxes.attr('checked',false);
                    $(this).attr('checked',true);
                    $(this).attr('class','checked');
                });
            }
        }*/

        $('.option-checkbox').each(function () {
            $(this).change(function () {
                $('.option-checkbox').not(this).removeAttr('checked');
                divID = $(this).next('.qualifying').attr('id');
                if(divID != '') {
                    console.log(divID);
                    closeAllPanels();
                    if(this.checked == true) {
                        console.log('checked');
                        showPanel(divID);
                    } else {
                        console.log('unchecked');
                        hidePanel(divID);
                    }

                    //togglePanel(divID);
                }
                /*$('.option-checkbox').removeAttr('checked');
                $(this).attr('checked',true);*/
            });
        });
    });

  </script>
  <script type="text/javascript">
    var validation = {};
    
    validation.postcode = function () {
      var retVal = true;
      var pc = $("#postcode");
    
      if (pc.val().length === 0) {
        $("#msg").html("Please enter a post code");
    
        retVal = false;
      }
      else {
        $("#msg").html("");
      }
    
      return retVal;
    }
    
    
    
  </script>
  <style type="text/css">
   input[type="radio"] { width: 22px;
    height: 18px;}
  input[type="checkbox"] {
    width: 24px;
    height: 25px;

  }.qualifying {display: block;}
    .outer_wrapper { height: auto;}
    .outer_wrapper .outer_wrapper {
    width: 103%;
    right: 3%;
    position: relative;
    }
  </style>
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

      setBenefits('Income-Related Employment Support Allowance: '+v);
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

      setBenefits('Child Tax Credit: '+v);
    }

      function set_tax_credit(v) {
      var tax_credit = $("#opt_tax_credit2").val();

      if (tax_credit.length == 0) {
        var tax_credits = []
      }
      else {
        var tax_credits = tax_credit.split(', ');
      }
      
      tax_credits.push('Child Tax Credit: '+v);
    
      // $("#tax_credit").val(tax_credits.join('Child Tax Credit (household income below £15,850)::'));
      $("#tax_credit").val(tax_credits.join(', '));

          setBenefits(v);
    }

    /*function set_sub_val(val, name) {
        if($('input[name="'+name+'"]').checked()) {
            setBenefits($(this).val()+val);
        } else {
            setBenefits(val);
        }
    }*/

    function set_multi_val(group1, group2, prefix) {
        var group1_val = $('input[name="'+group1+'"]:checked').val();
        var group2_val = $('input[name="'+group2+'"]:checked').val();

        console.log(group1_val);
        console.log(group2_val);

        var benefits_val1 = (typeof group1_val != 'undefined')? group1_val : '';
        var benefits_val2;
        if(typeof group2_val != 'undefined') {
            if(benefits_val1 == '') {
                benefits_val2 = group2_val;
            } else {
                benefits_val2 = ', '+group2_val;
            }
        } else {
            benefits_val2 = '';
        }
        //var benefits_val2 = (typeof group2_val != 'undefined')? (', ' + group2_val) : '';
        console.log('benefits val: ' + benefits_val1 + benefits_val2);

        setBenefits(prefix + benefits_val1 + benefits_val2);
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

       setBenefits('Income-based Jobseekers Allowance (JSA): '+v);
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

      setBenefits('Pension Guarantee Credit: '+v);

    }


   
   
    function reset_benefits() {
      $("#no_support").val('NO');

      var benefits6 = $("#benefits6").is(':checked');
      
      if (benefits6) {
        $('#benefits2').attr('checked', false);
        $('#benefits').attr('checked', false);
                        $('#benefits7').attr('checked', false);

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

      setBenefits('I do not receive one of the above benefits');
    
    }


     function reset_benefits2() {
      $("#incomeSupportNew").val('NO');

      var benefits7 = $("#benefits7").is(':checked');
	 
      
      if (benefits7) {
        $('#benefits2').attr('checked', false);
                $('#benefits6').attr('checked', false);

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


     function reset_benefits3() {
      $("#incomeSupportNew").val('NO');

      var benefits_income_related6 = $("#benefits_income_related6").is(':checked');
      
      if (benefits_income_related6) {
        $('#benefits2').attr('checked', false);
        $('#benefits6').attr('checked', false);
        $('#benefits7').attr('checked', false);

        $('#benefits').attr('checked', false);
        $('#benefits_income_related').attr('checked', false);
        $('#benefits_income_related2').attr('checked', false);
        $('#benefits_income_related3').attr('checked', false);
        $('#benefits_income_related4').attr('checked', false);
        $('#benefits_income_related5').attr('checked', false);
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


    /***** Set Benefits Values *****/
    function setBenefits(value) {
		alert (value);
        $('#benefits').val(value);
    }

    
  </script>













