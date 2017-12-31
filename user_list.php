<?php
session_start();
if($_SESSION["role"] != 'ADMIN') {
    header('location: index.php');
    exit();
}
include_once("db_connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Apexgreen Admin</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
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
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
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
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
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
        <div class="clear"></div>
        <div class="box round first">
            <h2>User List</h2>

            <div class="block">
                <div id="employee_table">
                    <?php
                    include_once("db_connection.php");
                    //$select_query = "select i.ID, i.insert_time,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,i.notes,ifnull(lse.status_code,'REM') status_code from insulations i left outer join lead_status_event lse on i.ID = lse.id order by id desc";

                    $select_query = "select id, username,password,role,message, colour_code from user_role where active_flag='Y' ";

                    //$select_query = "select * from confirm_order_address order by id desc";

                    // $res = mysqli_query($conn, "select * from insulations where status_code = 'REM' order by id desc");
                    $res = mysqli_query($conn, $select_query);

                    echo "<table border='1' width=100%>";
                    echo "<tr>";
                    echo "<tr bgcolor='#1ab2ff'>";
                    //echo "<a href=" .'lead_details.php'."?id=".$row['ID'].">" . $row['ID'] . "</a>";
                    echo "<td style='font-weight:bold'>"; echo "Serial No"; echo "</td>";
                    echo "<td style='font-weight:bold'>"; echo "User Name"; echo "</td>";
                    echo "<td style='font-weight:bold'>"; echo "Password"; echo "</td>";
                    echo "<td style='font-weight:bold'>"; echo "Role"; echo "</td>";
                    echo "<td style='font-weight:bold'>"; echo "Message"; echo "</td>";
                    echo "<td style='font-weight:bold'>"; echo "Colour Code"; echo "</td>";
                    echo "<td style='font-weight:bold'>"; echo "/"; echo "</td>";


                    //echo "<td style='font-weight:bold'>"; echo "view order"; echo "</td>";
                    echo "</tr>";

                    $sno = 1;

                    $col="#ff66cc";//"#ffffff"default white color

                    while($row=mysqli_fetch_array($res))
                    {
                        echo "<tr>";
                        //echo "<td>"; echo $sno; echo "</td>";
                        //echo "<td>"; echo $row["time_to_phone"]; echo "</td>";
                        // echo "<td>"; echo $row["title"] . ' ' . $row["forename"] . ' ' . $row["surname"]; echo "</td>";
                        echo "<td>";
                        echo "<a href=" .'edit_user.php'."?id=".$row['id'].">" . $row['id'] . "</a>";
                        echo "</td>";
                        //echo "<td>"; echo $row["id"]; echo "</td>";
                        echo "<td>"; echo $row["username"]; echo "</td>";
                        echo "<td>"; echo $row["password"]; echo "</td>";
                        echo "<td>"; echo $row["role"]; echo "</td>";
                        echo "<td>"; echo $row["message"]; echo "</td>";
                        echo "<td style='text-align: center'>
                                <div style='width: 25px; height: 25px; display: inline-block; border: 1px solid #333; background-color:"; echo $row["colour_code"]; echo "'></div>
                                </td>";
                        ?>
                        <td>
                            <?php
                            if($row['role'] !== 'ADMIN') {
                                echo '<input type="submit" name="deactivate" value = "Remove" onclick="deactivate_source('.$row['id'].')"/>';
                            }
                            ?>

                        </td>
                        </tr>
                        <?php
                        $sno=$sno+1;
                    }
                    ?>
                    </table>



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
        2017 Apex Green
    </p>
</div>

</body>
<!-- Body Ends Here -->

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type = "text/javascript">
    function deactivate_source(src_id) {
        var v_src_id=src_id;
        alert (v_src_id);
        $.ajax({
            type: "POST",
            url: 'deactivate_user.php',
            data: { source_id: v_src_id },
            success:function(html) {
                alert(html);
            }

        });
    }
    $(document).ready(function(){
        $('#create_excel').click(function(){
            var excel_data = $('#employee_table').html();
            var page = "excel.php?data=" + excel_data;
            alert('I am here');
            window.location=page;
        });

    });
</script>
