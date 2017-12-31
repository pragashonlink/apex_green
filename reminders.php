<?php
session_start();
$v_role=$_SESSION["role"];
//if ($v_role == 'ADMIN') $var_admin='ADMIN';
// echo "i am out";
//echo $_SESSION["role"];
if (!isset($_SESSION["role"])&&($_SESSION["role"] != 'ADMIN' && $_SESSION['role'] != 'ASSI')) {
    //echo "i am in";
    //echo $_SESSION["role"];
    header("Location: login.php");
    exit();
}

if(isset($_SESSION['role']) && ($_SESSION['role'] != 'ADMIN' && $_SESSION['role'] != 'ASSI')) {
    header("Location: login.php");
    exit();
}


?>
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
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->

    <script type="text/javascript" src="js/quill.min.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="js/setup.js"></script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            font-family:'Raleway',sans-serif;
            font-size:12.5px
        }
        #send {
            width:10%;
            height:35px;
            margin-top:10px;
            border-radius:3px;
            background-color:#0000cc;
            border:1px solid #fff;
            color:#fff;
            font-family:'Raleway',sans-serif;
            font-size:12px
        }
        select {

            background-repeat:no-repeat;
            background-position:300px;
            width:353px;
            padding:12px;
            margin-top:8px;
            font-family:'Raleway',sans-serif;;
            line-height:1;
            border-radius:5px;


            font-size:14px;
            -webkit-appearance:none;

            outline:none
        }
        #se {
            width:10%;
            height:35px;
            margin-top:10px;
            border-radius:3px;

            border:1px solid #fff;

            font-family:'Raleway',sans-serif;
            font-size:12px
        }
        #input {

            background-repeat:no-repeat;
            background-position:300px;
            background-color:sky blue;
            width:353px;
            padding:12px;
            margin-top:8px;
            font-family:'Raleway',sans-serif;;
            line-height:1;
            border-radius:5px;


            font-size:14px;
            -webkit-appearance:none;

            outline:none
        }

    </style
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
    <script src="js/setup.js" type="text/javascript"></script>
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



        <!--  <div class="box round">
			   
                <h2>
                   Search</h2>  <div id="search_count"></div>
                <div class="block">
                   <?php
        //include "search.php";
        ?>
                    <div class="clear">
                    </div>
                </div>
            </div>-->


        <div class="box round first">
            <h2>
                All Reminders&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                &nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp
                <!--<input id="send" type="submit" name="create_excel" value="Export list" onclick="document.location = 'excel_export2.php?status=REM';" style="width: 100px" size=1/>-->
                <?php
                if(isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN') {
                    ?>
                    <button type="button" id="exportExcel">Export to Excel</button>
                    <?php
                }
                ?>
            </h2>

            <div class="block">
                <div id="employee_table">
                    <?php
                    include_once("db_connection.php");

                    if(isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    if(isset($_GET['per_page'])) {
                        $per_page = $_GET['per_page'];
                    } else {
                        $per_page = 50;
                    }

                    if($page == '' || $page == 1) {
                        $page1 = 0;
                    } else {
                        $page1 = ($page * $per_page) - $per_page;
                    }

                    //$select_query = "select i.ID, i.insert_time,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,i.notes,ifnull(lse.status_code,'REM')  from insulations i left outer join lead_status_event lse on i.ID = lse.id order by id desc";

                    $select_query = "select i.ID, Date_format(i.insert_time,'%d-%m-%Y %r') itime,Date_format(i.completed_date,'%d-%m-%Y') completed_date,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,i.notes from insulations i , lead_status_event lse where i.ID = lse.id and lse.status_code='REM' order by id desc LIMIT $page1, $per_page";
                    $full_query = "select i.ID, Date_format(i.insert_time,'%d-%m-%Y %r') itime,Date_format(i.completed_date,'%d-%m-%Y') completed_date,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,i.notes from insulations i , lead_status_event lse where i.ID = lse.id and lse.status_code='REM' order by id desc";





                    //$select_query = "select * from confirm_order_address order by id desc";

                    // $res = mysqli_query($conn, "select * from insulations where status_code = 'REM' order by id desc");
                    $res = mysqli_query($conn, $select_query);

                    $num_rows=mysqli_num_rows($res);

                    $rslt = mysqli_query($conn, $full_query);
                    $records = mysqli_num_rows($rslt);
                    $records_pages = ceil($records / $per_page);

                    $prev = $page - 1;
                    $next = $page + 1;

                    echo "<h5>";
                    echo "Jobs &nbsp".  $num_rows;
                    echo "</h5>";

                    echo "<table border='1' width=100% class='tablesorter'>";
                    echo "<thead>";
                    echo "<tr bgcolor='#1ab2ff'>";
                    echo "<th style='font-weight:bold'>"; echo "<input type='checkbox' id='select-all'/>"; echo "</th>";
                    echo "<th style='font-weight:bold'>"; echo "Job No"; echo "</th>";
                    echo "<th style='font-weight:bold'>"; echo "Date & Time"; echo "</th>";
                    /*echo "<th style='font-weight:bold'>"; echo "Completed Date"; echo "</th>";*/
                    echo "<th style='font-weight:bold'>"; echo "Customer Name"; echo "</th>";
                    echo "<th style='font-weight:bold'>"; echo "Address"; echo "</th>";
                    echo "<th style='font-weight:bold'>"; echo "Post Code"; echo "</th>";
                    echo "<th style='font-weight:bold'>"; echo "Telephone 1"; echo "</th>";
                    echo "<th style='font-weight:bold'>"; echo "Telephone 2"; echo "</th>";
                    echo "<th style='font-weight:bold'>"; echo "Email"; echo "</th>";
                    echo "<th style='font-weight:bold; width: 285px; max-width: initial'>"; echo "Notes"; echo "</th>";

                    //echo "<td style='font-weight:bold'>"; echo "view order"; echo "</td>";
                    echo "</tr>";
                    echo "</thead>";

                    $sno = 1;

                    $col="#ff66cc";//"#ffffff"default white color
                    echo "<tbody>";
                    while($row=mysqli_fetch_array($res))
                    {
                        echo "<tr bgcolor= #ff9999>";
                        echo "<td>";

                        echo "<input type='checkbox'style='width: 20px; height: 20px '  name='chkid'  value='".$row['ID']."' data-email='".$row['email']."' onClick=\"set_email_arr('".$row['ID']."')\">";

                        echo "</td>";
                        echo "<td>";
                        //echo $row["ID"];
                        echo "<a href=" .'lead_details.php'."?id=".$row['ID'].">" . $row['ID'] . "</a>";
                        echo "</td>";
                        //echo "<td>"; echo $sno; echo "</td>";
                        echo "<td>"; echo $row["itime"]; echo "</td>";
                        /*echo "<td>"; echo $row ["completed_date"]; echo "</td>";*/
                        //echo "<td>"; echo $row["time_to_phone"]; echo "</td>";
                        echo "<td>"; echo $row["title"] . ' ' . $row["forename"] . ' ' . $row["surname"]; echo "</td>";
                        echo "<td>"; echo $row["address"]; echo "</td>";
                        echo "<td>"; echo strtoupper ($row["postcode"]); echo "</td>";
                        echo "<td>"; echo $row["phone"]; echo "</td>";
                        echo "<td>"; echo $row["altno"]; echo "</td>";
                        echo "<td>"; echo $row["email"]; echo "</td>";
                        echo "<td>"; echo $row["notes"]; echo "</td>";
                        echo "</tr>";
                        $sno=$sno+1;
                    }
                    echo "</tbody>";
                    echo "</table>";

                    ?>
                </div>

                <div class="text-center">
                    <div class="" style="display: inline-block; vertical-align: middle;">
                        <form name="per_page_f" method="GET" action="">
                            <label>Show </label>
                            <select name="per_page" class="input-sm" style="width: 65px; margin-left: 10px; margin-right: 10px; margin-top: 0;" onchange="per_page_f.submit()">
                                <option value="50" <?php echo (isset($_GET['per_page']) && $_GET['per_page'] == 50) ? 'selected' : ''; ?>>50</option>
                                <option value="100" <?php echo (isset($_GET['per_page']) && $_GET['per_page'] == 100) ? 'selected' : ''; ?>>100</option>
                                <option value="200" <?php echo (isset($_GET['per_page']) && $_GET['per_page'] == 200) ? 'selected' : ''; ?>>200</option>
                                <option value="500" <?php echo (isset($_GET['per_page']) && $_GET['per_page'] == 500) ? 'selected' : ''; ?>>500</option>
                            </select>
                            <label> records per page</label>
                        </form>
                    </div>
                    <nav aria-label="Page navigation" style="display: inline-block; vertical-align: middle; margin-left: 15px;">
                        <ul class="pagination">
                            <?php

                            if($prev >= 1) {
                                echo "<li><a href='?page=".$prev."&per_page=".$per_page."' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
                            }

                            if($records_pages >= 2) {
                                for($r = 1; $r <= $records_pages; $r++) {
                                    $active = ($r == $page) ? 'class="active"' : '';
                                    echo "<li $active><a href='?page=".$r."&per_page=".$per_page."'>".$r."</a></li>";
                                }
                            }

                            if($next <= $records_pages && $records_pages >= 2) {
                                echo "<li><a href='?page=".$next."&per_page=".$per_page."' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>

    </div>
    <div class="grid_5">
        <input type="hidden" value="reminder" id="view"/>
    </div>


    <?php
    include "footer.php";

    ?>
    <div style="display: none;">
        <div id="message-body" style="display: none;"></div>
    </div>
