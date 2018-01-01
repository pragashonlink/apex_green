<?php
session_start();
$v_role=$_SESSION["role"];
if ($v_role == 'ADMIN') $var_admin='ADMIN';
?>
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

$query = "select i.ID, i.insert_time,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email, i.email_sent, i.email_sent_date, i.fuel_type,i.notes,i.wall_insulation_type,i.roof_insulation_type,i.owner,i.boiler_period,i.property_type,i.propertyPeriod,i.benefits ,i.hdn_payment_type,i.lead_source,i.created_by,i.cavity_charges,i.cavity_area,i.cavity_gap,i.loft_charges, i.loft_area, i.insu_required,ifnull(lse.status_code,'NEW') status_code,Date_format(lse.start,'%d-%m-%Y %r') start, IFNULL(sd.name, i.created_by) AS source from insulations i left outer join lead_status_event lse on i.ID = lse.id 
    left outer join site_details as sd on i.siteId = sd.Id where i.id = $var1";
//echo "query : " . $query;

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

?>
</head>
<body>

<?php

$asses_list_query = "SELECT id, username FROM user_role WHERE (role = 'ASMT' OR role = 'ASSI') AND active_flag = 'Y'";
$inst_list_query = "SELECT id, username FROM user_role WHERE (role = 'INST' OR role = 'ASSI') AND active_flag = 'Y'";
//echo "query : " . $query;

$asses_result = mysqli_query($conn,$asses_list_query);
$inst_result = mysqli_query($conn,$inst_list_query);

?>

<div class="popup" id="assessment-assign">
    <button class="popup-close" type="button" onclick="closePopup(this)">&times;</button>
    <div class="popup-content">
        <h4>Assign a user to assessment</h4>
        <select id="asses-select">
            <option value="">Select a user</option>
            <?php
            while($asses_list = mysqli_fetch_array($asses_result)) {
                echo '<option value="'.$asses_list['id'].'">',$asses_list['username'],'</option>';
            }
            ?>
        </select>
        <button class="btn btn-primary" id="asses-btn" type="button" onclick="assign(<?php echo $var1 ?>, 'ASMT')">Assign</button>
        <input type="hidden" value="<?php echo $var1 ?>" id="asses_job">
    </div>
</div>

<div class="popup" id="install-assign">
    <button class="popup-close" type="button" onclick="closePopup(this)">&times;</button>
    <div class="popup-content">
        <h4>Assign a user to installment</h4>
        <select id="inst-select">
            <option value="">Select a user</option>
            <?php
            while($inst_list = mysqli_fetch_array($inst_result)) {
                echo '<option value="'.$inst_list['id'].'">',$inst_list['full_name'],'</option>';
            }
            ?>
        </select>
        <button class="btn btn-primary" id="inst-btn" type="button" onclick="assign(<?php echo $var1 ?>, 'INST')">Assign</button>
        <input type="hidden" value="<?php echo $var1 ?>" id="inst_job">
    </div>
</div>

<div class="grid_12">
    <div class="">
        <div class="grid_12"></div>
        <div class="">
            <div class="block">
                <table style="width:56%; margin-left: auto; margin-right: auto;" align="center"    >
                <tr>
                    <th  colspan="2" style="background-color:#6666ff" >
                        <h4 align="center"  >Job Details</h4>
                    </th>
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
                    <th contenteditable='true'><div id="fn"><?php  echo empty($row['forename'])? "N/A": $row['forename']; ?></div></th>

                </tr>
                <tr>
                    <th >Surname:</th>
                    <th contenteditable='true'><div id="sn"><?php echo empty($row['surname'])? "N/A": $row['surname']; ?></div></th>

                </tr>
                <tr>
                    <th>Your Address:</th>
                    <th contenteditable='true'><div id="ad"><?php echo empty($row['address'])? "N/A": $row['address']; ?></div></th>
                </tr>
                <tr>
                    <th>Postcode:</th>
                    <th contenteditable='true'><div id="pc"> <?php echo empty($row['postcode'])? "N/A": $row['postcode']; ?></div></th>

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
                    <th contenteditable='true'  > <div id="em"><?php echo empty($row['email'])? "N/A": $row['email']; ?></div></th>

                </tr>
                <tr>
                    <th>Primary Source Of Heating</th>
                    <th contenteditable='true'><div id="ft"><?php echo empty($row['fuel_type'])? "N/A": $row['fuel_type']; ?></div></th>

                </tr>
                <!--  <tr>
                 <th>How Old Is The Current Boiler?</th>
                 <th contenteditable='true'><div id="ba"></div></th>

               </tr>
               <tr>
                 <th>Type Of Property</th>
                 <th >N/A</th>

               </tr>
               <tr>
                 <th>Your Property Built (Approximately)?</th>
                 <th >N/A</th>

               </tr>-->
                <tr>
                    <th>How Old Is The Current Boiler?</th>
                    <th contenteditable='true'><div id="ba"><?php echo empty($row['boiler_period'])? "N/A": $row['boiler_period']; ?></div></th>

                </tr>
                <tr>
                    <th>Type Of Property</th>
                    <th contenteditable='true'><div id="tp"><?php echo empty($row['property_type'])? "N/A": $row['property_type']; ?> </div></th>

                </tr>
                <tr>
                    <th>Your Property Built (Approximately)?</th>
                    <th contenteditable='true'><div id="pb"><?php echo empty($row['propertyPeriod'])? "N/A": $row['propertyPeriod']; ?></div></th>

                </tr>
                <tr>
                    <th>Select Insulation Type Required</th>
                    <th contenteditable='true'><div id="wit"><?php echo empty($row['wall_insulation_type'])? "N/A": $row['wall_insulation_type']; ?></div></th>

                </tr>
                <tr>
                    <th>Number Of Bedrooms</th>
                    <th contenteditable='true'><div id="rit"><?php echo empty($row['roof_insulation_type'])? "N/A": $row['roof_insulation_type']; ?></div></th>

                </tr>
                <tr>
                    <th>Owner Or Tenant</th>
                    <th contenteditable='true'><div id="ow"><?php  echo empty($row['owner'])? "N/A": $row['owner']; ?></div></th>
                </tr>
                <tr>
                    <th>Benefits Received (By Occupier)</th>
                    <th contenteditable='true'> <div id="be"><?php echo empty($row['benefits'])? "No Benefits": $row['benefits']; ?></th>
                </tr>
                <tr>
                    <th>Payment_type</th>
                    <th > <?php echo  $row['hdn_payment_type']; ?></th>
                </tr>
                <tr>
                    <th>Job Source</th>
                    <th><?php echo $row['source']; ?></th>
                </tr>

                <tr>

                    <th>Charges Cavity Walls £ </th>
                    <th contenteditable='true'><div id="cc"><?php echo empty($row['cavity_charges'])? "00": $row['cavity_charges']; ?></div></th>
                </tr>
                <tr>
                    <th>Area Meter Sq. Cavity Walls  (m2)</th>
                    <th contenteditable='true'><div id="ca"><?php echo empty($row['cavity_area'])? "00": $row['cavity_area']; ?></div></th>
                </tr>
                <tr>
                    <th>Cavity Gap Or Depth (mm)</th>
                    <th contenteditable='true'><div id="cg"><?php echo empty($row['cavity_gap'])? "00": $row['cavity_gap']; ?></div></th>
                </tr>
                <tr>
                    <th>Charges Loft Insulation £</th>
                    <th contenteditable='true'><div id="lc"><?php echo empty($row['loft_charges'])? "00": $row['loft_charges']; ?></div></th>
                </tr>
                <tr>
                    <th>Meter Sq. Area Loft Insulation  (m2)</th>
                    <th contenteditable='true'><div id="la"><?php echo empty($row['loft_area'])? "00": $row['loft_area']; ?></div></th>
                </tr>
                <tr>
                    <th>Existing Loft Insulation  (mm)</th>
                    <th contenteditable='true'><div id="ir"><?php echo empty($row['insu_required'])? "00": $row['insu_required']; ?></div></th>
                </tr>


                <?php
                //$res_event = mysqli_query($conn, "select * from events where id = ".$row['ID'].";");
                if ($row['status_code']=='INST') {
                    echo "<tr><th>Installation Time</th>";
                    echo "<th>";
                    echo $row['start'];
                    echo"</th></tr>";

                }
                if ($row['status_code']=='ASMT') {
                    echo "<tr><th>Assesment Time</th>";
                    echo "<th>";
                    echo $row['start'];
                    echo"</th></tr>";

                }
                if ($row['status_code']=='REM') {
                    echo "<tr><th>Reminder Time</th>";
                    echo "<th>";
                    echo $row['start'];
                    echo"</th></tr>";

                }
                if ($row['status_code']=='COMP') {
                    echo "<tr><th>Completed Time</th>";
                    echo "<th>";
                    echo $row['start'];
                    echo" </th></tr>";

                }
                ?>




                </table>
                <div align="center">
                    <th colspan="2"  ><h5 >Notes</h5></th>
                    <textarea  name="notes" id="noteid"  rows="6" cols="110"></textarea>
                    <p id="prev_note"><?php echo empty($row['notes']) ? "" : $row['notes']; ?></p>
                </div>
                <br>

                <div class="col-md-6 col-md-offset-3">
                    <div class="btn-group pull-left">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: auto;">
                            Send Email to Customer <span class="caret"></span>
                        </button>
                        <?php
                        $args = '\''.$row['email'].'\', \''.$row['forename'].' '. $row['surname'] .'\', \''.$row['ID'].'\', \''.$row['postcode'].'\'';
                        ?>
                        <ul class="dropdown-menu" id="send_cont">
                            <li><span id="first_cont" onclick="emailUser('first_cont', <?php echo $args; ?>)">First Contact</span></li>
                            <li><span id="second_cont" onclick="emailUser('second_cont', <?php echo $args; ?>)">Second Contact</span></li>
                            <li><span id="third_cont" onclick="emailUser('third_cont', <?php echo $args; ?>)">Third Contact</span></li>
                        </ul>
                    </div> &nbsp;
                    <span class="pull-right">
                        <?php

                        $q = "SELECT `type`, `sent_date` FROM job_email_log WHERE job_id = ".$row['ID'];
                        $rs = mysqli_query($conn, $q);
                        echo '<ul class="">';
                        while($r = mysqli_fetch_array($rs)) {
                            $d = new DateTime($r['sent_date']);
                            $dt = $d->format('d/m/Y H:i:s');
                            if(isset($r['type'])) {
                                if($r['type'] === 'first_cont') {
                                    echo '<li>(First email sent on '. $dt .')</li>';
                                } else if($r['type'] === 'second_cont') {
                                    echo '<li>(Second email sent on '. $dt .')</li>';
                                } else if($r['type'] === 'third_cont') {
                                    echo '<li>(Third email sent on '. $dt .')</li>';
                                }
                            }
                        }
                        echo '</ul>';
                        ?>
                    </span>
                </div>
                <div class="clearfix"></div>
                <!-- Div for reminder Popup Starts -->
                <div id="reminder-popup">
                    <!-- Popup Div Starts Here -->
                    <div id="popupContact">

                        <form action="update_lead_reminder.php" id="form" method="post" name="form">
                            <img id="close" src="img/cross.png" onclick ="closeReminderWindow()">
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
                            <textarea style="width:100%; height:150px;" id="msg" name="rem_message" placeholder="Message"></textarea>
                            <input type="text" name="lead_id" value=<?php echo $var1?>>
                            <button type="button" id="send_reminder" onclick="sendReminder()">Send</button>
                        </form>
                    </div>
                    <!-- Popup Div Ends Here -->
                </div>
                <!-- Div for reminder Popup Ends -->
                <?php echo $row['status_code']; ?>

                <div align="center">
                    <input id="send" type="button" name="save" value="Save" onclick="return saveLead(<?php echo $var1;?>)"/>

                    <?php
                    if ($v_role == 'ADMIN' OR $v_role == 'ASSI')
                    { ?>
                        <input id="send" type="submit" name="assesmentbtn" value="Assessment" id="assesment-btn-details" onclick="<?php echo 'document.location = \'booking_cal.php?id='.$var1.'&status=ASMT\';' ?>" <?php echo ($row['status_code'] == 'COMP') ? 'hidden' : ''; ?>/>
                        <input id="send" type="submit" name="installation" value="Installation" id="installation-btn-details" onclick="<?php echo 'document.location = \'booking_cal.php?id='.$var1.'&status=INST\';' ?>"  <?php echo ($row['status_code'] == 'COMP') ? 'hidden' : ''; ?>/>
                        <input id="send" type="submit" name="Qualified" onclick="changeleadstatus('QULI',<?php echo $var1;?>)" value="Qualified" <?php echo ($row['status_code'] == 'QULI') ? 'disabled' : ''; ?>/>
                    <?php }
                    if ($v_role == 'ADMIN' OR $v_role == 'ASSI' OR $v_role == 'INST' )
                    {
                        ?>
                        <input id="send" type="button" name="completed" data-toggle="modal" data-target="#completed-modal" value="Completed" <?php echo ($row['status_code'] == 'COMP') ? 'disabled' : ''; ?> />
                        <br>
                        <input id="send" type="submit" name="incompleted" onclick="changeleadstatus('ICOM',<?php echo $var1;?>)" value="Area not Covered" <?php echo ($row['status_code'] == 'ICOM') ? 'disabled' : ''; ?> />
                        <input id="send" type="submit" name="missed" onclick="changeleadstatus('MISSED',<?php echo $var1;?>)" value="Missed" <?php echo ($row['status_code'] == 'MISSED') ? 'disabled' : ''; ?> />

                    <?php }
                    if ($v_role == 'ADMIN' OR $v_role == 'ASSI')
                    { ?>
                        <input id="send" type="submit" value="Rejection" onclick="changeleadstatus('RJCT',<?php echo $var1;?>)" class="details-btns last-btn" <?php echo ($row['status_code'] == 'RJCT') ? 'disabled' : ''; ?>>
                        <input id="send" type="submit" name="remindersbtn" class="reminder-main-btn" value="Reminders"  onclick="openReminderWindow()">
                        <input id="send" type="submit" name="readey to book" onclick="changeleadstatus('RDTB',<?php echo $var1;?>)" value="Heating" <?php echo ($row['status_code'] == 'RDTB') ? 'disabled' : ''; ?> />
                        <input id="send" type="submit" value="Unable to Contact" onclick="changeleadstatus('UTA',<?php echo $var1;?>)" class="details-btns" <?php echo ($row['status_code'] == 'UTA') ? 'disabled' : ''; ?> >
                        <br>
                    <?php }

                    if ($v_role == 'ADMIN')
                    { ?>
                        <input id="send" type="submit" value="Delete" onClick="delete_record(<?php echo $var1;?>)" >
                    <?php }

                    if ($v_role == 'ADMIN' OR $v_role == 'ASSI' OR $v_role == 'ASMT')
                    {
                        ?>
                        <input id="send" type="submit" name="Visit Completed" value="Visit Completed" onclick="changeleadstatus('VC',<?php echo $var1;?>)" <?php echo ($row['status_code'] == 'VC') ? 'disabled' : ''; ?> >
                        <input  id="send"type="submit"  name="Reject After Ass."value="Reject After Ass." onclick="changeleadstatus('RAA',<?php echo $var1;?>)" <?php echo ($row['status_code'] == 'RAA') ? 'disabled' : ''; ?>  />
                        <input id="send" type="submit" name="Call back not ready" value="Call back not ready" onclick="changeleadstatus('CBNR',<?php echo $var1;?>)" <?php echo ($row['status_code'] == 'CBNR') ? 'disabled' : ''; ?>>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clear">
</div>
</div>

<input type="hidden" id="id" value="<?php echo $var1;?>">
<input type="hidden" id="current_user" value="<?php echo $_SESSION["user"];?>">

</body>
<script>
    //array to store selected ids
    function go_delete(v_leadid)
    {
        var_sel_id_arr = [v_leadid ];
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
    function delete_selected(v_leadid)
    {
        if (confirm("Are You sure you want to delete?") == true){
            go_delete(v_leadid);
        }
    }

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

    $('.popup-close').each(function() {
        $(this).on('click', function () {
            $(this).parent().hide();
        });
    });

</script>
</html>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->