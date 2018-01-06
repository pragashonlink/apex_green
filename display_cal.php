<?php
session_start();
$v_role = $_SESSION["role"];
if ($v_role == 'ADMIN' || $v_role == 'ASSI') $var_admin='ADMIN';

/*echo '<pre>';
print_r($_SESSION);
echo '</br>';*/

if(isset($_SESSION['role'])) {

}

?>`


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Apexgreen Admin</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/quill-snow.css" media="screen" />
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

    <script type="text/javascript" src="js/quill.min.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>

</head>
<body>
<div class="container_12">
    <div class="grid_12 header-repeat">
        <?php
        //if ($v_role == 'ADMIN') {
            include "head.php";
        //}
        ?>
    </div>
    <div class="clear">
    </div>
    <div class="grid_12">

    </div>
    <div class="clear">
    </div>
    <?php
    if ($v_role == 'ADMIN' || $v_role == 'ASSI') {
    ?>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <?php
                    include "sidebar.php";
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="<?php echo ($v_role == 'ADMIN' || $v_role == 'ASSI') ? 'grid_10' : 'grid_12'; ?>">
        <?php
            //echo '<h1>', $_SESSION['id'], '</h1>';
        ?>
        <div class="clear"></div>

        <div class="box round first">
            <div class="block">
                <div id="employee_table">
                    <?php

                    $year = (isset($_GET['year'])) ? $_GET['year'] : date("Y");
                    $week = (isset($_GET['week'])) ? $_GET['week'] : date('W');
                    $v_status = $_GET['status'];
                    include_once("db_connection.php");
                    ?>

                    <head>
                        <style>
                            table {
                                font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                            }

                            td, th {
                                border: 1px solid #eee;
                                text-align: center;
                                padding: 2px;
                            }

                            tr:nth-child(even) {
                                background-color: #dddddd;
                            }
                        </style>
                    </head>
                    <body>
                    <?php
                    echo (isset($_GET) && $_GET['status'] === 'INST') ? '<h3>Installation Calendar</h3>' : '<h3>Assessment Calendar</h3>';
                    ?>
                    <table border='1' style='border-collapse:collapse;' align="center">
                        <tr>
                            <td align="center">
                                <button type="button" onclick="window.location.href='<?php echo $_SERVER['PHP_SELF'].'?week='.($week == 1 ? 52 : $week -1).'&year='.($week == 1 ? $year - 1 : $year) .'&status='.$v_status; ?>'" style="width: auto;">Pre Week</button> <!--Previous week-->
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

                                
                                //exit;

                                //echo "time= ". $var_d;
                                //echo "<td>". date('l', $var_d) ."<br>". date('d M', $var_d) ."</td>";
                                if ($var_d == '') {
                                    echo date('F Y');
                                }
                                else {
                                    echo date('F Y', $var_d);
                                }
                                
                                $v_date_srch_start=date('d-m-Y', $var_d);
                                $v_date_srch_end=date('d-m-Y', $var_d+3600*24*7);
                                $v_month = date('m', $var_d);

                                if ($v_role == 'ADMIN'){
                                    $v_query="SELECT lse.start,lse.id,i.postcode, i.assigned_to, r.username FROM lead_status_event lse, insulations i LEFT JOIN user_role r ON i.assigned_to = r.id WHERE i.ID=lse.id and lse.status_code='$v_status' and lse.start between str_to_date('$v_date_srch_start','%d-%m-%Y') and str_to_date('$v_date_srch_end','%d-%m-%Y')";
                                }
                                else{
                                    $v_query="SELECT lse.start,lse.id,i.postcode, i.assigned_to, r.username FROM lead_status_event lse, insulations i LEFT JOIN user_role r ON i.assigned_to = r.id WHERE i.ID=lse.id and lse.status_code='$v_status' and lse.start between str_to_date('$v_date_srch_start','%d-%m-%Y') and str_to_date('$v_date_srch_end','%d-%m-%Y')"; //Date_format(lse.start,'%Y-%m-%d')=curdate()
                                }
                                //echo $v_query;
                                $res_event = mysqli_query($conn, $v_query);
                                //echo 'no of rows ' .mysqli_num_rows($res_event);

                                $var_book1_match = '';
                                $var_book2_match = '';
                                $var_book3_match = '';
                                $var_book4_match = '';

                                $var_book1_assigned = '';
                                $var_book2_assigned = '';
                                $var_book3_assigned = '';
                                $var_book4_assigned = '';

                                $assign_id_1 = '';
                                $assign_id_2 = '';
                                $assign_id_3 = '';
                                $assign_id_4 = '';

                                $disabled_1 = '';
                                $disabled_2 = '';
                                $disabled_3 = '';
                                $disabled_4 = '';
                                ?>
                            </td>
                            <td>
                                <button type="button" onclick="window.location.href='<?php echo $_SERVER['PHP_SELF'].'?week='.($week == 52 ? 1 : 1 + $week).'&year='.($week == 52 ? 1 + $year : $year).'&status='.$v_status; ?>'" style="width: auto;">Next  Week</button> <!--Next week-->
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
                            for($col_cnt = 1; $col_cnt <= 11; $col_cnt++){ //start for loop to print rows

                            echo '<tr>';
                            echo '<td>';
                            $timestamp = strtotime($time_cnt) + 3600 * $col_cnt;

                            echo date('h:i A', $timestamp);

                            //echo 'Time';
                            echo '</td>';
                            for($dayin= 1; $dayin <= 7; $dayin++){ //Loop to print columns of cal

                            echo '<td>';

                            $week_var2=$week;
                            $year_var2=$year;

                            if($week_var2 < 10) {
                                $week_var2 = '0'. $week_var2;
                            }
                            $d2 = strtotime($year_var2 ."W". $week_var2 . $dayin); //date equivalent
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
                                    $var_book1_post = strtoupper($row["postcode"]);
                                    //echo $var_book1_post;

                                    $var_book1_assigned = (isset($row["username"])) ? $row['username'] : '';

                                    $assign_id_1 = (isset($row["assigned_to"])) ? $row['assigned_to'] : '';

                                    if(($v_role !== 'ADMIN' && $v_role !== 'ASSI') && isset($_SESSION['id'])) {
                                        if($v_status === 'ASMT') {
                                            if($_SESSION['colour_code'] != 'yellow' && $_SESSION['role'] !== $v_status) {
                                                $disabled_1 = 'disabled';
                                            }
                                        } else {
                                            if($_SESSION['colour_code'] != 'yellow' && $_SESSION['role'] !== $v_status) {
                                                $disabled_1 = 'disabled';
                                            }
                                        }
                                    }

                                    //echo "<input type='button' name='Book1' value='".$row["id"]."' style='width:59px; height:25px;  background-color: red'/>&nbsp;&nbsp;";
                                }
                                if ($v_data_time == $d3+900)
                                {
                                    //echo 'book2 &nbsp&nbsp';  echo $row["id"];
                                    $var_book2_match = $row["id"];
                                    $var_book2_post =strtoupper($row["postcode"]);

                                    $var_book2_assigned = (isset($row["username"])) ? $row['username'] : '';

                                    $assign_id_2 = (isset($row["assigned_to"])) ? $row['assigned_to'] : '';

                                    if(($v_role !== 'ADMIN' && $v_role !== 'ASSI') && isset($_SESSION['id'])) {
                                        if($v_status === 'ASMT') {
                                            if($_SESSION['colour_code'] != 'red' && $_SESSION['role'] !== $v_status) {
                                                $disabled_2 = 'disabled';
                                            }
                                        } else {
                                            if($_SESSION['colour_code'] != 'red' && $_SESSION['role'] !== $v_status) {
                                                $disabled_2 = 'disabled';
                                            }
                                        }
                                    }
                                }
                                if ($v_data_time == $d3+1800)
                                {
                                    //echo 'book3';  echo $row["id"];
                                    $var_book3_match = $row["id"];
                                    $var_book3_post = strtoupper($row["postcode"]);

                                    $var_book3_assigned = (isset($row["username"])) ? $row['username'] : '';

                                    $assign_id_3 = (isset($row["assigned_to"])) ? $row['assigned_to'] : '';

                                    if(($v_role !== 'ADMIN' && $v_role !== 'ASSI') && isset($_SESSION['id'])) {
                                        if($v_status === 'ASMT') {
                                            if($_SESSION['colour_code'] != 'orange' && $_SESSION['role'] !== $v_status) {
                                                $disabled_3 = 'disabled';
                                            }
                                        } else {
                                            if($_SESSION['colour_code'] != 'orange' && $_SESSION['role'] !== $v_status) {
                                                $disabled_3 = 'disabled';
                                            }
                                        }
                                    }
                                }
                                if ($v_data_time == $d3+2700)
                                {
                                    //echo 'book4';  echo $row["id"];
                                    $var_book4_match = $row["id"];
                                    $var_book4_post = strtoupper($row["postcode"]);

                                    $var_book4_assigned = (isset($row["username"])) ? $row['username'] : '';

                                    $assign_id_4 = (isset($row["assigned_to"])) ? $row['assigned_to'] : '';

                                    if(($v_role !== 'ADMIN' && $v_role !== 'ASSI') && isset($_SESSION['id'])) {
                                        if($v_status === 'ASMT') {
                                            if($_SESSION['colour_code'] != 'pink' && $_SESSION['role'] !== $v_status) {
                                                $disabled_4 = 'disabled';
                                            }
                                        } else {
                                            if($_SESSION['colour_code'] != 'pink' && $_SESSION['role'] !== $v_status) {
                                                $disabled_4 = 'disabled';
                                            }
                                        }
                                    }
                                }
                            }
                            mysqli_data_seek($res_event, 0);
                            echo "<table> <tr><td>";
                            if (empty($var_book1_match) && $var_book1_match==0 )
                            {
                                //echo 'Book1 not' . $var_book1_match;
                                echo "<input type='button' name='Book1' value='Slot 1' style='width:65px; height:25px;   background-color: #99ccff'/>";

                            }
                            else
                            {
                                //echo 'Book1  ' . $var_book1_match;
                                ?>
                                <input type='button' name='Book1' class='show-leads-btn' data-id='<?php echo $var_book1_match?>' <?php echo $disabled_1; ?> value='<?php echo $var_book1_post?>' title="<?php echo $var_book1_assigned;?>" <?php echo (isset($_SESSION['colour_code']) && $_SESSION['colour_code'] !== 'yellow') ? 'disabled' : ''; ?> style='width:65px; height:25px;  background-color: yellow; font-size:10px'/>&nbsp;&nbsp;
                                <?php
                                $var_book1_match = 0;
                            }
                            echo "</td><td>";
                            //if (empty($var_book2_match))
                            if(empty($var_book2_match) && $var_book2_match==0 )
                            {
                                echo "<input type='button' name='Book2' value='Slot 2' style='width:65px; height:25px;  background-color: #99ccff'/>";

                            }
                            else
                            {
                                ?>
                                <input type='button' name='Book1' class='show-leads-btn' data-id='<?php echo $var_book2_match?>' <?php echo $disabled_2; ?> value='<?php echo $var_book2_post?>' title="<?php echo $var_book2_assigned;?>" <?php echo (isset($_SESSION['colour_code']) && $_SESSION['colour_code'] !== 'red') ? 'disabled' : ''; ?> style='width:65px; height:25px;  background-color: red;font-size:10px'/>&nbsp;&nbsp;
                                <?php

                                $var_book2_match=0;
                            }
                            echo "</td><tr><td>";
                            if(empty($var_book3_match) && $var_book3_match==0 )
                            {
                                echo "<input type='button' name='Book3' value='Slot 3' style='width:65px; height:25px;  background-color: #99ccff'/>";
                                //echo 'book3';  echo $row["id"];
                            }
                            else {
                                //echo 'book3';  echo $row["id"];
                                ?>
                                <input type='button' name='Book1' class='show-leads-btn' data-id='<?php echo $var_book3_match?>' <?php echo $disabled_3; ?> value='<?php echo $var_book3_post?>' title="<?php echo $var_book3_assigned;?>" <?php echo (isset($_SESSION['colour_code']) && $_SESSION['colour_code'] !== 'orange') ? 'disabled' : ''; ?> style='width:65px; height:25px;  background-color: orange;font-size:10px'/>&nbsp;&nbsp;
                                <?php
                                $var_book3_match=0;
                            }
                            echo "</td><td>";
                            //if (empty($var_book4_match))
                            if(empty($var_book4_match) && $var_book4_match==0 )
                            {
                                echo "<input type='button' name='Book4' value='Slot 4' style='width:65px; height:25px;  background-color: #99ccff'/>";

                            }
                            else
                            {
                                ?>
                                <input type='button' name='Book1' class='show-leads-btn' data-id='<?php echo $var_book4_match?>' <?php echo $disabled_4; ?> value='<?php echo $var_book4_post?>' title="<?php echo $var_book4_assigned;?>" <?php echo (isset($_SESSION['colour_code']) && $_SESSION['colour_code'] !== 'pink') ? 'disabled' : ''; ?> style='width:65px; height:25px;  background-color: pink;font-size:10px'/>&nbsp;&nbsp;
                                <?php

                                $var_book4_match=0;
                            }
                            ?>
                            </td>
                        </tr>
                    </table>

                        </td>

                    <?php } // Close column loop
                    ?>
                        </tr>
                    <?php
                    }//Close row loop after 6:00 PM

                    ?>
                    </table>
                    </body>
</html>
<script type = "text/javascript">
    function redirect(p_lead_id) {
        v_date=p_date;
        url="lead_details.php?id="+p_lead_id;
        alert ('I am here');
        window.location(url);
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
