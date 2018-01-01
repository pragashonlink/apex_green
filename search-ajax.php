<?php
include_once("db_connection.php");
$email_arr = "";
//print_r($_POST);

$page = (isset($_POST['page'])) ? $_POST['page'] : 1;
$per_page = (isset($_POST['per_page'])) ? $_POST['per_page'] : 50;
$page1 = ($page == '' || $page == 1) ? 0 : ($page * $per_page) - $per_page;

$full_query = '';

$limit = " LIMIT $page1, $per_page";

if (isset($_POST['Search'])){

    // for keyword search
    if (isset($_POST['Keyword']) and !is_null($_POST['Keyword']) and !empty($_POST['Keyword'])) {
        //echo 'I am here' . $_POST['Keyword'];

        $v_Keyword=$_POST['Keyword'];
        $v_keword_str = " select i.ID, Date_format(i.insert_time,'%d-%m-%Y %r') itime,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,i.notes,ifnull(lse.status_code,'NEW') status_code from insulations i left outer join lead_status_event lse on i.ID = lse.id where i.forename like '%$v_Keyword%' OR i.surname like '%$v_Keyword%' OR i.address like '%$v_Keyword%' OR i.postcode like '%$v_Keyword%' OR i.email like '%$v_Keyword%'OR i.phone like '%$v_Keyword%' OR i.lead_source like '%$v_Keyword%' order by id desc";
        //echo $v_keword_str;
    } else {
        $v_keword_str = " ";
    }

    // for fuel type
    if (isset($_POST['fuel_type']) and !is_null($_POST['fuel_type']) and !empty($_POST['fuel_type'])) {
        //echo 'I am here' . $_POST['fuel_type'];
        $v_fuel_type=$_POST['fuel_type'];
        if($v_fuel_type === 'Main Gas') {
            $v_fuel_str = " AND i.fuel_type LIKE '%Gas%'";
        } else {
            $v_fuel_str=" AND i.fuel_type = '" .$v_fuel_type ."' ";
        }
    } else {
        $v_fuel_str=' ';
    }
    // for Site group
    if (isset($_POST['site_details']) and !is_null($_POST['site_details']) and !empty($_POST['site_details']))
    {
        //echo 'I am here' . $_POST['fuel_type'];

        $v_site_source=$_POST['site_details'];
        $v_site_str=" AND i.siteID = '" .$v_site_source ."' ";
    }
    else
    {$v_site_str=' ';}

    // for lead source
    if (isset($_POST['lead_source']) and !is_null($_POST['lead_source']) and !empty($_POST['lead_source']))
    {
        //echo 'I am here' . $_POST['fuel_type'];

        $v_lead_source=$_POST['lead_source'];
        $v_lead_source_str=" AND i.lead_source = '" .$v_lead_source ."' ";
    }
    else
    {$v_lead_source_str=' ';}

    //For Status Check
    if (isset($_POST['status']) and !is_null($_POST['status']) and !empty($_POST['status']))
    {
        //echo 'I am here' . $_POST['fuel_type'];

        $v_lead_status=$_POST['status'];
        $v_lead_sts_str=" AND status_code = '" .$v_lead_status ."' ";
    }
    else
    {
        $v_lead_sts_str=' ';
    }

    // for wall insulation type
    if (isset($_POST['insulation_type']) and !is_null($_POST['insulation_type']) and !empty($_POST['insulation_type']) )
    {
        $v_insulation_type=$_POST['insulation_type'];
        $v_insulation_str = " AND i.wall_insulation_type = '" .$v_insulation_type ."' ";
    }
    else
    {$v_insulation_str = ' ';}

    // for benefits
    if (isset($_POST['benefits']) and !empty($_POST['benefits']))
    {
        $v_benefits=$_POST['benefits'];
        if ($v_benefits=='Yes')
        { $v_ben_str=" AND (benefits != 'No Benefits - NO' AND benefits != ' ' AND benefits != 'No' AND benefits NOT LIKE '%I do not%')" ;
            //$v_ben_str=" AND ifnull(benefits,'No Benefits - NO') != 'No Benefits - NO' ";
        }
        if ($v_benefits=='No')
        {
            $v_ben_str=" AND (benefits = 'No Benefits - NO' OR benefits = ' ' OR benefits = 'No' OR benefits LIKE '%I do not%')" ;
            //$v_ben_str=" AND ifnull(benefits,'No Benefits - NO') = 'No Benefits - NO' ";
        }
    }
    else
    {$v_ben_str=' ' ;}

    // for creation date search
    if (isset($_POST['date_search']) and !is_null($_POST['date_search']) and !empty($_POST['date_search']))
    {
        //echo 'I am here' . $_POST['fuel_type'];

        $v_date=$_POST['date_search'];
        if ($v_date == 'today'){
            $v_date_str = "  cast(insert_time as date) > DATE_SUB(NOW(), INTERVAL 1 DAY) ";
        }
        elseif ($v_date == 'yesterday'){
            $v_date_str = "  DATE(insert_time) = SUBDATE(CURRENT_DATE(), INTERVAL 1 DAY) ";
        }
        elseif ($v_date == '7days'){
            $v_date_str = "  cast(insert_time as date) > DATE_SUB(NOW(), INTERVAL 1 WEEK) ";
        }
        elseif ($v_date == '30days'){
            $v_date_str = "  cast(insert_time as date) > DATE_SUB(NOW(), INTERVAL 30 DAY)  ";
        }
        elseif ($v_date == '14days'){
            $v_date_str = "  cast(insert_time as date) > DATE_SUB(NOW(), INTERVAL 14 DAY)  ";
        }
        elseif ($v_date == 'curr_month'){
            $v_date_str = ' YEAR(insert_time) = YEAR(CURRENT_DATE()) AND MONTH(insert_time) = MONTH(CURRENT_DATE()) ';

        }
        elseif ($v_date == '40days'){
            $v_date_str = "  cast(insert_time as date) > DATE_SUB(NOW(), INTERVAL 40 DAY)  ";
        }
        elseif ($v_date == '60days'){
            $v_date_str = "  cast(insert_time as date) > DATE_SUB(NOW(), INTERVAL 60 DAY)  ";
        }
        elseif ($v_date == '90days'){
            $v_date_str = "  cast(insert_time as date) > DATE_SUB(NOW(), INTERVAL 90 DAY)  ";
        }
        elseif ($v_date == 'prev_month'){
            $v_date_str = ' YEAR(insert_time) = YEAR(CURRENT_DATE()) AND MONTH(insert_time) = MONTH(CURRENT_DATE()) -1 ';
        }
        elseif ($v_date == 'curr_year'){
            $v_date_str = ' YEAR(insert_time) = YEAR(CURRENT_DATE())';
        }
        elseif ($v_date == 'prev_year'){
            $v_date_str = ' YEAR(insert_time) = YEAR(CURRENT_DATE()) -1';
        }
        elseif ($v_date == 'all_time'){
            $v_date_str = ' 1=1 ';
        }
    }
    if (!empty($_POST['from']) and !empty($_POST['to']))
    {
        $v_from = $_POST['from'];
        $v_to = $_POST['to'];
        $v_date_str = " cast(insert_time as date) between str_to_date('$v_from','%d/%m/%Y')  and str_to_date('$v_to','%d/%m/%Y')";
    }

    if (empty($v_date_str))
    {$v_date_str = ' insert_time > DATE_SUB(NOW(), INTERVAL 90 DAY) ';}

    //if (!empty($v_keword_str) and !is_null($v_keword_str))
    if ($v_keword_str==" ")
    {
        //echo 'No 2';
        $search_query = "select * from (select i.ID, i.insert_time,i.lead_source,i.siteID,i.fuel_type,i.wall_insulation_type,benefits , Date_format(i.insert_time,'%d-%m-%Y %r') itime,Date_format(i.completed_date,'%d-%m-%Y') completed_date,i.title,i.forename,i.surname,i.address,i.postcode,i.phone, i.altno,i.email,i.notes,ifnull(lse.status_code,'NEW') status_code from insulations i left outer join lead_status_event lse on i.ID = lse.id) i where " . $v_date_str. " " .$v_lead_sts_str. " " . $v_lead_source_str. " " . $v_site_str. " " .$v_fuel_str." " .$v_insulation_str." " .$v_ben_str. " order by id desc";
    }
    else
    {$search_query = $v_keword_str;
        //echo 'No 1'
    }

    //echo $search_query;
    //exit;

}

if (!empty($search_query) AND !is_null($search_query)) {$select_query = $search_query;
    //echo 'i have search';
} else {
    $select_query = "SELECT
                        i.ID,
                        i.insert_time,
                        Date_format(i.insert_time,'%d-%m-%Y %r') itime,
                        Date_format(i.completed_date,'%d-%m-%Y') completed_date,
                        i.title,
                        i.forename,
                        i.surname,
                        i.address,
                        i.postcode,
                        i.phone,
                        i.altno,
                        i.email,
                        i.notes,
                        ifnull(lse.status_code,'NEW') status_code
                     FROM
                        insulations i
                        LEFT OUTER JOIN lead_status_event lse
                        ON i.ID = lse.id
                     WHERE insert_time > DATE_SUB(NOW(), INTERVAL 90 DAY)
                     ORDER BY id DESC"; /*YEAR(insert_time) = YEAR(CURRENT_DATE()) AND MONTH(insert_time) = MONTH(CURRENT_DATE()) AND*/
    //echo 'i dont have search';
}
$query = $select_query." $limit";
//echo $query;
$res = mysqli_query($conn, $query);
$num_rows=mysqli_num_rows($res);

$rslt = mysqli_query($conn, $select_query);
$records = mysqli_num_rows($rslt);
$records_pages = ceil($records / $per_page);

echo "<h5>";
echo "Jobs &nbsp". $num_rows;
echo "</h5>";
echo "<table id='index_table' border='1'  border-collapse: collapse; width=100% class='tablesorter'>";
echo "<thead>";
echo "<tr bgcolor='#1ab2ff'>";
echo "<th style='font-weight:bold'>"; echo "<input type='checkbox' id='select-all' onClick='tickAll();'/>"; echo "</th>";
echo "<th style='font-weight:bold'>"; echo "Job No"; echo "</th>";
echo "<th style='font-weight:bold'>"; echo "Date & Time"; echo "</th>";

echo "<th style='font-weight:bold'>"; echo "Customer Name"; echo "</th>";
echo "<th style='font-weight:bold'>"; echo "Address"; echo "</th>";
echo "<th style='font-weight:bold'>"; echo "Post Code"; echo "</th>";
echo "<th style='font-weight:bold'>"; echo "Telephone 1"; echo "</th>";
echo "<th style='font-weight:bold'>"; echo "Telephone 2"; echo "</th>";
echo "<th style='font-weight:bold'>"; echo "Email"; echo "</th>";
echo "<th style='font-weight:bold; width: 300px; max-width: initial'>"; echo "Notes"; echo "</th>";

echo "</tr>";
echo "</thead>";

$col="#ffffff";//default white color
echo "<tbody>";
if($num_rows > 0) {
    while($row=mysqli_fetch_array($res)) {
        if ($row["status_code"] == 'ASMT') //Assesment Check
        {
            $col="##80ff80";//light blue
        }
        if ($row["status_code"] == 'INST') //installation
        {
            $col="#80ff80";//Light Green
        }
        if ($row["status_code"] == 'UTA') //Unable to answer
        {
            $col="#ffff1a";//default Gray color
        }
        if ($row["status_code"] == 'RDTB') //Ready to book
        {
            $col="#0790b2";//default Gray color
        }
        if ($row["status_code"] == 'QULI') //Qualified lead
        {
            $col="#1ad1ff";//default Gray color
        }
        if ($row["status_code"] == 'REM') //Reminder
        {
            $col="#ff9999";//default Gray color
        }
        if ($row["status_code"] == 'COMP') //completed
        {
            $col="#00b300";//default Gray color
        }
        if ($row["status_code"] == 'ICOM') //completed
        {
            $col="#ccff99";//default Gray color
        }
        if ($row["status_code"] == 'RJCT') //Rejected
        {
            $col="#ff794d";//default Gray color
        }
        if ($row["status_code"] == 'NEW') //Rejected
        {
            $col="#ffffff";//default Gray color
        }
        if ($row["status_code"] == 'VC') //Rejected
        {
            $col="GOLD";//default Gray color
        }
        if ($row["status_code"] == 'RAA') //Rejected
        {
            $col="#ff794d";//default Gray color
        }
        if ($row["status_code"] == 'CBNR') //Rejected
        {
            $col="Gold";//default Gray color
        }
        if ($row["status_code"] == 'NEW') //Rejected
        {
            $col="#ffffff";//default Gray color
        }
        if ($row["status_code"] == 'MISSED') //Missed
        {
            $col="yellow";//default Gray color
        }

        //$res_event = mysqli_query($conn, "select * from events where id = ".$row['ID'].";");


        echo "<tr bgcolor='$col'>";
        echo "<td>";

        echo "<input type='checkbox'style='width: 20px; height: 20px '  name='chkid'  value='".$row['ID']."' data-email='".$row['email']."' onClick=\"set_email_arr('".$row['ID']."')\">";

        echo "</td>";
        echo "<td>";
        //echo $row["ID"];
        echo "<a href=" .'lead_details.php'."?id=".$row['ID']." target='_blank'>" . $row['ID'] . "</a>";
        echo "</td>";
        //echo date(($insert_time));
        //echo "<td>"; echo $row  ["d/m/Y" "insert_time"]; echo "</td>";
        echo "<td>"; echo $row ["itime"]; echo "</td>";
        /*echo "<td>"; echo $row ["completed_date"]; echo "</td>";*/
        //echo "<td>"; echo mysqli_fetch_array($res_event)["start"]; echo "</td>";
        echo "<td>"; echo strip_tags($row["title"] . ' ' . $row["forename"] . ' ' . $row["surname"]); echo "</td>";
        echo "<td>"; echo $row["address"]; echo "</td>";
        echo "<td>"; echo strtoupper ($row["postcode"]); echo "</td>";
        echo "<td>"; echo $row["phone"]; echo "</td>";
        echo "<td>"; echo $row["altno"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td><div class='note'>"; echo $row["notes"]; echo "</div></td>";
        echo "</tr>";
        //$sno=$sno+1;
    }
} else {
    echo "<tr> <td colspan='10' class='text-center'> <span class='text-center text-muted'> <i>No records</i> </span> </td> </tr>";
}
echo "<tbody>";
echo "</table>";

$prev = $page - 1;
$next = $page + 1;

?>

<div class="text-center">
    <div class="" style="display: inline-block; vertical-align: middle;">
        <form name="per_page_f" method="GET" action="">
            <label>Show </label>
            <select name="per_page" class="input-sm" id="per_page" style="width: 65px; margin-left: 10px; margin-right: 10px; margin-top: 0;" onchange="gotoPage(1, this.value)">
                <option value="50" <?php echo (isset($_POST['per_page']) && $_POST['per_page'] == 50) ? 'selected' : ''; ?>>50</option>
                <option value="100" <?php echo (isset($_POST['per_page']) && $_POST['per_page'] == 100) ? 'selected' : ''; ?>>100</option>
                <option value="200" <?php echo (isset($_POST['per_page']) && $_POST['per_page'] == 200) ? 'selected' : ''; ?>>200</option>
                <option value="500" <?php echo (isset($_POST['per_page']) && $_POST['per_page'] == 500) ? 'selected' : ''; ?>>500</option>
            </select>
            <label> records per page</label>
        </form>
    </div>
    <nav aria-label="Page navigation" style="display: inline-block; vertical-align: middle; margin-left: 15px;">
        <ul class="pagination">
            <?php

            if($prev >= 1) {
                echo "<li><span onclick='return gotoPage($prev, per_page_f[\"per_page\"].value)' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></span></li>";
            }

            if($records_pages >= 2) {
                for($r = 1; $r <= $records_pages; $r++) {
                    $active = ($r == $page) ? 'class="active"' : '';
                    echo "<li $active><span onclick='return gotoPage($r, per_page_f[\"per_page\"].value)'>".$r."</span></li>";
                }
            }

            if($next <= $records_pages && $records_pages >= 2) {
                echo "<li><span onclick='return gotoPage($next, per_page_f[\"per_page\"].value)' aria-label='Next'><span aria-hidden='true'>&raquo;</span></span></li>";
            }
            ?>
        </ul>
    </nav>


</div>

<script>
    $("body #employee_table table").tablesorter({
        sortList: [[1,0], [5,0]],
        headers: {
            0: { sorter: false },
            1: { sorter: false },
            2: { sorter: false },
            3: { sorter: false },
            4: { sorter: false },
            6: { sorter: false },
            7: { sorter: false },
            8: { sorter: false },
            9: { sorter: false }
        }
    });

</script>