
<form id="form" action=""  method="post" name="form">
  <div class="stat-col">
                        
                        
                           
             <SELECT style="width: 150px" size=1 name="date_search"> <OPTION value="" 

                    selected>-- Select Date --  
					<OPTION value="today">Today
					<OPTION value="yesterday">Yesterday
					<OPTION value="7days">Last 7 Days
					<OPTION value="curr_month">This Month 
					<OPTION value="prev_month">Last Month
					<OPTION value="curr_year">This Year
					<OPTION value="prev_year">Last Year
					</SELECT> 
				
                    </div>
					  <div class="stat-col">
                       
                       
                           
				<input type="text" placeholder="Keyword" name="Keyword" id="se" style="width:150px" style="height:20px"></p>
                    </div>

<div class="stat-col">
                        
                       
                          		
             <SELECT style="width: 150px" size=1 name="fuel_type"> <OPTION value="" 

                    selected>-- Fuel Type -- 
					 <option value="Main Gas">Mains Gas</option>
                        <option value="Oil">Oil</option>
                        <option value="LPG">LPG</option>
                        <option value="ElectricStorageHeater">Electric Storage Heater</option>
                        <option value="no_central_heating_system">Other</option>
					</SELECT> 
				
                    </div>
                  
                    <div class="stat-col">
                        
                        
                               
             <SELECT style="width: 170px" size=1 name="insulation_type"> 
					<OPTION value="" selected>- Wall Insulation Type - 
					 <option value="Cavity Wall Insulation">Cavity Wall Insulation</option>
                        <option value="External Wall Insulation">External Wall Insulation</option>
                        <option value="Not Required">Not Required</option>
					
					</SELECT> 
			
                    </div>
                    <div class="stat-col">
                        
                        
                          	
             <SELECT style="width: 150px" size=1 name="benefits"> <OPTION value="" 

                    selected> - Select Benefits - 
					<option value="Yes">Benifit Receive
					<option value="No"> No Benifit Receive
					
					
					</SELECT> 
			
                    </div>
                  
                   
                    <div class="stat-col last">
                       
                        
                           <input  type="submit" id="send" value="Search"  style="width:100px" style="height:25px" size=1 name="Search" />
                    </div>
					</form>
					<?php
				include_once("db_connection.php");
				//echo "hello1";
				//print_r($_POST);
				
				if ($_POST['Search']){
				
				// for keyword search
				if (isset($_POST['Keyword']) and !is_null($_POST['Keyword']) and !empty($_POST['Keyword']))
				{
					//echo 'I am here' . $_POST['fuel_type'];
				
				$v_Keyword=$_POST['Keyword'];
				$v_keword_str = " OR i.forename like '%$v_Keyword%' OR i.surname like '%$v_Keyword%' OR i.address like '%$v_Keyword%' OR i.postcode like '%$v_Keyword%'
OR i.email like '%$v_Keyword%'OR i.phone like '%$v_Keyword%'";
				//echo $v_keword_str;
				}
				else
				{$v_keword_str = " ";}
				
				// for fuel type
				if (isset($_POST['fuel_type']) and !is_null($_POST['fuel_type']) and !empty($_POST['fuel_type']))
				{
					//echo 'I am here' . $_POST['fuel_type'];
				
				$v_fuel_type=$_POST['fuel_type'];
				}
				else
				{$v_fuel_type="fake";}
				// for wall insulation type
				if (isset($_POST['insulation_type']) and !is_null($_POST['insulation_type']) and !empty($_POST['insulation_type']) )
				{
					$v_insulation_type=$_POST['insulation_type'];
				}
				else
				{$v_insulation_type="fake";}
				
				// for benefits
				if (isset($_POST['benefits']))
				{
					$v_benefits=$_POST['benefits'];
				}
				else
				{$v_benefits="fake";}
			
				if ($v_benefits=='Yes')
				{$v_ben_str='OR benefits IS NOT NULL';}
				if ($v_benefits=='No')
				{$v_ben_str='OR benefits IS NULL';}
				if ($v_benefits=='fake')
				{$v_ben_str="OR benefits = 'fake'";}
				
				// for creation date search
				if (isset($_POST['date_search']) and !is_null($_POST['date_search']) and !empty($_POST['date_search']))
				{
					//echo 'I am here' . $_POST['fuel_type'];
				
				$v_date=$_POST['date_search'];
				if ($v_date == 'today'){
					$v_date_str = " OR insert_time > DATE_SUB(NOW(), INTERVAL 1 DAY) ";
				}
				elseif ($v_date == 'yesterday'){
					$v_date_str = " OR DATE(insert_time) = SUBDATE(CURRENT_DATE(), INTERVAL 1 DAY) ";
				}
				elseif ($v_date == '7days'){
					$v_date_str = " OR insert_time > DATE_SUB(NOW(), INTERVAL 1 WEEK) ";
				}
				//echo $v_date_str;
				}
				else
				{$v_date_str = " ";}
			
				$search_query = "select i.ID, i.insert_time,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,i.notes,ifnull(lse.status_code,'NEW') status_code from insulations i left outer join lead_status_event lse on i.ID = lse.id where i.fuel_type = '$v_fuel_type' OR i.wall_insulation_type = '$v_insulation_type' ".$v_ben_str. " " .$v_keword_str. " ". $v_date_str. " order by id desc";
				}
				//echo $search_query;
				
			?>