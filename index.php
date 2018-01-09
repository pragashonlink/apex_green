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
    <link rel="stylesheet" type="text/css" href="css/quill-snow.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />


    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->

    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css"/>
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
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>




    <style>
        table, {

            table-layout:fixed;


        }
        td, th {

            text-align: left;
            max-width:200px;
            word-wrap:break-word;


        }

    </style>
</head>
<body>
<div class="container_12">
    <div class="grid_12 header-repeat">
        <?php
        include "head.php";
        /*session_start();*/
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
        <div class="box round">

            <h2>
            </h2>  <div id="search_count"></div>

            <?php
            include "search.php";
            ?>
            <div class="clear">
            </div>

        </div>





        <div class="box round first">




            <h2 ><?php echo (isset($num_rows)) ? $num_rows : ''; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp



                <input id="send" type="reset" value=" Reset Search"style="width: 150px" size=1 name="submit" onclick="window.location='index.php'" />&nbsp&nbsp&nbsp&nbsp
                <input id="send" type="submit" name="emailSelected" value="Email Selected" style="width: 100px" onclick="div_show()">
                <?php
                if ($v_role == 'ADMIN')
                { ?>

                    &nbsp&nbsp&nbsp&nbsp
                    <input id="delete" type="submit" name="delete_selected" value="Delete Selcted" onClick="delete_selected()" style="width: 100px" size=1/>
                    &nbsp&nbsp&nbsp&nbsp
                    <!--<input id="send" type="submit" name="create_excel" value="Export list" onclick="window.location='excel_export2.php'" style="width: 100px" size=1/>-->
                    <button type="button" id="exportExcel">Export to Excel</button>
                <?php }?>
            </h2>


            <div class="block">
                <div id="employee_table">
                    <?php
                    
                    ?>
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
        2017 Apex Green. |  Apex Green!
    </p>
</div>
<div id="abc">
    <!-- Popup Div Starts Here -->
    <div id="popupContact">
        <!-- Email selected Form -->
        <form id="form1" name="form">
            <img id="close" src="img/cross.png" onclick ="div_hide()">

            <input name="email" id="email" readonly type="text" style="width:100%"  />
            <br/>
            <br/>
            <br/>
            <input name="sub" required placeholder="Subject" type="text" value="" style="width:100%"  />
            <br/>
            <br/>
            <br/>
            <div id="message-body"></div>
            <!--<textarea id="msg"  required name="message" placeholder="Message" ></textarea>-->
            <input type="button" id="submit" name="send" value="Send" onclick="send_email(sub.value,'#message-body .ql-editor')"/>


        </form>
    </div>
    <!-- Popup Div Ends Here -->
</div>

<input type="hidden" value="insert_time > DATE_SUB(NOW(), INTERVAL 90 DAY)" id="where_clause"/>
<input type="hidden" value="index" id="view"/>
</body>
<!-- Body Ends Here -->

<script type="text/javascript">
    var_sel_id_arr = [ ]; //array to store selected ids

    // Validating Empty Field
    function check_empty() {
        alert("Ready to submit form");
        document.getElementById("form").submit();
        alert("Form Submitted Successfully...");

    }

    //function to export to excel



    function delete_selected()
    {
        /*if(window.confirm("Are you sure you want to delete?")) {
         $.ajax({
         type: "POST",
         url: 'delete_selected.php',
         data: { vids: var_sel_id_arr},
         success: function(v) {
         alert (v);
         window.location='index.php';
         }
         });
         }*/

    }
    //Function To Display Popup
    function div_show() {
        document.getElementById('abc').style.display = "block";
    }
    //Function to Hide Popup
    function div_hide(){
        document.getElementById('abc').style.display = "none";
    }

    function log(msg) {
        console.log(msg);
    }

    function tickAll() {
        var array = document.getElementsByTagName("input");

        for(var i = 0; i < array.length; i++)
        {
            log(array[i].name);

            if(array[i].name === "chkid")
            {
                //if(array[i].className == YOUR_CLASS_NAME) {
                array[i].checked = document.getElementById('select-all').checked;
                //}
            }
        }        
    }
</script>
<script type="text/javascript">
    var_sel_id_arr = [ ]; //array to store selected ids

    // Validating Empty Field
    function check_empty() {
        alert("Ready to submit form");
        document.getElementById("form").submit();
        alert("Form Submitted Successfully...");

    }

    //function to export to excel


    function send_email(vsub,vmsg) {
        //alert("reay to send"+vsub+vmsg);
        console.log(vsub);
        console.log(var_sel_id_arr);
        var message = $(vmsg).html();
        var email = $('#email').val();
        div_hide();
        $.ajax({
            type: "POST",
            url: 'email_selected.php',
            data: {email: email, vids: var_sel_id_arr, sub: vsub, msg: message },
            success: function(v) {
                alert (v);
                //window.location='lead_details.php?id='+v_lead_id;
            }
        });
    }
    function reset_search () {
        alert( 'i am in reset' );
        document.getElementById('date_search').value = "";
        document.getElementById('fuel_type').value = "";
        document.getElementById('insulation_type').value = "";
        document.getElementById('benefits').value = "";
        document.getElementById('Keyword').value = "";
        window.location='index.php';
    }

    function delete_selected() {
        if(window.confirm("Are you sure you want to delete?")) {
            $.ajax({
                type: "POST",
                url: 'delete_selected.php',
                data: {vids: var_sel_id_arr},
                success: function (v) {
                    alert(v);
                    window.location = 'index.php';
                }
            });
        }
    }
    //Function To Display Popup
    function div_show() {
        if(!$.isEmptyObject(var_sel_id_arr)) {
            document.getElementById('abc').style.display = "block";

        } else {
            alert("Please select at least one record to send mails");
        }
    }
    //Function to Hide Popup
    function div_hide(){
        document.getElementById('abc').style.display = "none";
    }

    function set_email_arr(v) {
        //console.log(v);
        var index = var_sel_id_arr.indexOf(v);
        //console.log(index);
        //alert ('index of ' +v ' is ' + index);
        if (index > -1) {
            var_sel_id_arr.splice(index, 1);
        }
        else{
            var_sel_id_arr.push(v);
        }
        //console.log(var_sel_id_arr);
    }

</script>

</html>

<style>
    select {
        background-repeat:no-repeat;
        background-position:300px;
        width:353px;
        padding:12px;
        margin-top:8px;
        font-family:Cursive;
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
    @import "http://fonts.googleapis.com/css?family=Raleway";
    #abc {
        width:100%;
        height:100%;
        opacity:.95;
        top:0;
        left:0;
        display:none;
        position:fixed;
        background-color:#313131;
        overflow:auto
    }
    img#close {

        position:absolute;
        right:-14px;
        top:-14px;
        cursor:pointer
    }
    div#popupContact {
        position:absolute;
        left:50%;
        top:17%;
        margin-left:-202px;
        font-family:'Raleway',sans-serif
    }
    #form1 {
        max-width:400px;
        min-width:250px;
        padding:10px 50px;
        border:2px solid gray;
        border-radius:10px;
        font-family:raleway;
        background-color:#fff
    }
    p {
        margin-top:30px
    }
    h2 {
        background-color:#FEFFED;
        padding:20px 35px;
        margin:-10px -50px;
        text-align:center;
        border-radius:10px 10px 0 0
    }
    hr {
        margin:10px -50px;
        border:0;
        border-top:1px solid #ccc
    }


    textarea {
        height:180px;
        margin-top:10px;
        padding:5px;
        box-shadow:1px 1px 12px gray;
        border-radius:3px
    }
    #submit {
        text-decoration:none;
        width:100%;
        margin-top:10px;
        text-align:center;
        display:block;
        background-color:#0000cc;
        color:#fff;
        border:1px solid #FFCB00;
        padding:10px 0;
        font-size:20px;
        cursor:pointer;
        border-radius:5px
    }



</style>