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
	<style>
	table {
    border-collapse: collapse;
}
table, td, th {
    border: 1px solid black;
}
</style>
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
		 
       
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
		
                    <ul class="section menu">
		
                       
						<li><a class="menuitem" a href="index.php">Home</a></li>
                        <li><a class="menuitem" a href="create_lead.php">Create Lead</a></li>
                        <li><a class="menuitem" a href="rejection.php"> Rejection</a></li>
						<li><a class="menuitem" a href="reminders.php"> Reminders</a></li>
						<li><a class="menuitem" a href="assesment.php"> Assesments</a></li>
						<li><a class="menuitem" a href="installation.php"> Installation</a></li>
						<li><a class="menuitem" a href="qualified_leads.php"> Qualified Lead</a></li>
						<li><a class="menuitem" a href="ready_to_book.php"> Ready to Book</a></li>
						<li><a class="menuitem" a href="unable_to_contact.php"> Unable to Contact</a></li>
						<li><a class="menuitem" a href="completed.php"> Completed</a></li>
						<li><a class="menuitem" a href="display_cal.php"> Assesments Calender</a></li>
						<li><a class="menuitem" a href="cal.php"> Installation Calender</a></li>
						<li><a class="menuitem" a href="index.php"> placeholder1</a></li>
						<li><a class="menuitem" a href="index.php"> placeholder2</a></li>
                        <li><a class="menuitem">User</a>
                            <ul class="submenu">
                                <li><a class="menuitem" a href="index_user.php">Create User</a> </li>
                                <li><a>User List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="grid_10">
            <div class="box round first">
			<div class="grid_12">
            
		<ul class="nav main" >
		 <form name="form" method="post"  action="search_lead_action.php">
		
               <br> <li ><td align="right"></td>
			   <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	
             <SELECT style="width: 150px" size=1 name="country"> <OPTION value="" 

                    selected>-- Select Date --  
					<OPTION value=GB>today:
					<OPTION value=US>yesterday
					<OPTION value=US>Last 7 Days
					<OPTION value=GB>This Month 
					<OPTION value=US>Last Month
					<OPTION value=US>This Year
					<OPTION value=US>Last Year
					</SELECT> 
				</li>&nbsp&nbsp
				</li><input type="text" placeholder="Keyword" name="Keyword"  style="width:150px"></li>
       
                <li>&nbsp&nbsp
             <SELECT style="width: 150px" size=1 name="country"> <OPTION value="" 

                    selected>- Wall Insulation Type - 
					<OPTION value="Cavity Wall Insulation">Cavity Wall Insulation
					<OPTION value="External Wall Insulation">External Wall Insulation
					<OPTION value="Not Required">Not Required
					
					</SELECT> 
				</li>				
                
			
<li>&nbsp	
             <SELECT style="width: 150px" size=1 name="country"> <OPTION value="" 

                    selected>-- Fuel Type -- 
					<OPTION value=GB>Main gas
					<OPTION value=US>Oil
					<OPTION value=US>LPG
					<OPTION value=US>Electric storage Heater
					<OPTION value=US>Others
					</SELECT> 
				</li>
<li>&nbsp&nbsp&nbsp	
             <SELECT style="width: 150px" size=1 name="country"> <OPTION value="" 

                    selected> - Select Benefits - 
					<OPTION value=GB>Benifit Receive
					<OPTION value=US> No Benifit Receiven
					
					
					</SELECT> 
				</li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp					
                
				<input type="submit" value="Search"style="width: 75px" size=1 name="submit" />
</form>
            </ul>
			<br>
              
				 
				 <h2> All Enquiries &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					
				 
				 <input type="submit" value=" Reset Search"style="width: 150px" size=1 name="submit" />&nbsp&nbsp&nbsp&nbsp<input type="submit" value="Export list"style="width: 100px" size=1 name="submit" /> </h2>
				 </div>
                <div class="block">
                <?php
				include_once("db_connection.php");
				echo "hello1";
				print_r($_POST);
				
				echo   $_POST['insulation_type'];
				if (isset($_POST['insulation_type']))
				{
					echo 'I am here' . $_POST['insulation_type'];
				
				$v_insl_type=$_POST['insulation_type'];
				if ($v_insl_type = 'CWI')
				{
					$v_ins_search = "Cavity Wall Insulation";
				}
				}
				echo   $_POST['insulation_type'];
				if (isset($_POST['insulation_type']))
				{
					echo 'I am here' . $_POST['insulation_type'];
				
				$v_insl_type=$_POST['insulation_type'];
				if ($v_insl_type = 'EWI')
				{
					$v_ins_search = "External Wall Insulation";
				}
				}
				echo   $_POST['insulation_type'];
				if (isset($_POST['insulation_type']))
				{
					echo 'I am here' . $_POST['insulation_type'];
				
				$v_insl_type=$_POST['insulation_type'];
				if ($v_insl_type = 'NR')
				{
					$v_ins_search = "Not Required";
				}
				}
				echo   $_POST['fuel_type'];
				if (isset($_POST['fuel_type']))
				{
					echo 'I am here' . $_POST['fuel_type'];
				
				$v_fuel_type=$_POST['fuel_type'];
				if ($v_fuel_type = 'oil')
				{
					$v_fuel_search = "oil";
				}
				}
				echo   $_POST['fuel_type'];
				if (isset($_POST['fuel_type']))
				{
					echo 'I am here' . $_POST['fuel_type'];
				
				$v_fuel_type=$_POST['fuel_type'];
				if ($v_fuel_type = 'LPG')
				{
					$v_fuel_search = "LPG";
				}
				}
				echo   $_POST['fuel_type'];
				if (isset($_POST['fuel_type']))
				{
					echo 'I am here' . $_POST['fuel_type'];
				
				$v_fuel_type=$_POST['fuel_type'];
				if ($v_fuel_type = 'MG')
				{
					$v_fuel_search = "Main Gas";
				}
				}
				echo   $_POST['fuel_type'];
				if (isset($_POST['fuel_type']))
				{
					echo 'I am here' . $_POST['fuel_type'];
				
				$v_fuel_type=$_POST['fuel_type'];
				if ($v_fuel_type = 'ESH')
				{
					$v_fuel_search = "Electric storage Heater";
				}
				}
				echo   $_POST['fuel_type'];
				if (isset($_POST['fuel_type']))
				{
					echo 'I am here' . $_POST['fuel_type'];
				
				$v_fuel_type=$_POST['fuel_type'];
				
				if ($v_fuel_type = 'others')
				{
					$v_fuel_search = "others";
				}
				}

				$select_query = "select * from insulations where fuel_type = '" .$v_fuel_search . "' order by id desc";
			echo $select_query;
				echo   $_POST['benefits'];
				if (isset($_POST['benefits']))
				{
					echo 'I am here' . $_POST['benefits'];
				
				$v_benefits_type=$_POST['benefits'];
				
				if ($v_benefits_type = 'BR')
				{
					$v_benefits_search = "Benifit Receive";
				}
				}
				echo   $_POST['benefits'];
				if (isset($_POST['benefits']))
				{
					echo 'I am here' . $_POST['benefits'];
				
				$v_benefits_type=$_POST['benefits'];
				
				if ($v_benefits_type = 'NBR')
				{
					$v_benefits_search = "No Benifit Receive";
				}
				}
				 $res = mysqli_query($conn, $select_query);
				$select_query = "select * from insulations where benefits = '" .$v_benefits_search . "' order by id desc";
			echo $select_query;
            $res = mysqli_query($conn, $select_query);
			$select_query = "select * from insulations where wall_insulation_type = '" .$v_ins_search . "' order by id desc";
			echo $select_query;
			
			
			
			$select_query = "select * from insulations where benefits = '" .$v_benefits_search . "' order by id desc";
			echo $select_query;
            $res = mysqli_query($conn, $select_query);
			
			
			
            echo "<table id='index_table' border='1'  border-collapse: collapse; width=100%>";
			
            echo "<tr bgcolor='#d0d0e1'>";
			echo "<td style='font-weight:bold''font-color:black'>"; echo "Serial No"; echo "</td>";
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
					$col="#ffe680";//Light Green
				}
				if ($row["status_code"] == 'UTA') //Unable to answer
				{
					$col="#ffff1a";//default Gray color
				}
				if ($row["status_code"] == 'RDTB') //Ready to book
				{
					$col="orange";//default Gray color
				}
				if ($row["status_code"] == 'QULI') //Qualified lead
				{
					$col="pink";//default Gray color
				}
				if ($row["status_code"] == 'REM') //Reminder
				{
					$col="#ff6600";//default Gray color
				}
				if ($row["status_code"] == 'COMP') //completed
				{
					$col="#2eb82e";//default Gray color
				}
				if ($row["status_code"] == 'RJCT') //Rejected
				{
					$col="#e60000";//default Gray color
				}
				if ($row["status_code"] == 'NEW') //Rejected
				{
					$col="#ffffff";//default Gray color
				}

				
				$res_event = mysqli_query($conn, "select * from events where id = ".$row['ID'].";");
				
                echo "<tr bgcolor='$col'>";
				echo "<td>"; 
				//echo $row["ID"]; 
				echo "<a href=" .'lead_details.php'."?id=".$row['ID'].">" . $row['ID'] . "</a>";
				echo "</td>";
				echo "<td>"; echo mysqli_fetch_array($res_event)["start"]; echo "</td>";
                echo "<td>"; echo $row["title"] . ' ' . $row["forename"] . ' ' . $row["surname"]; echo "</td>";
                echo "<td>"; echo $row["address"]; echo "</td>";
                echo "<td>"; echo $row["postcode"]; echo "</td>";
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
            
                    
                    <div class="clear">
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
</html>
