<?php
require_once 'db_connection.php';
/** Include PHPExcel */
require_once 'Classes/PHPExcel.php';

$query = '';
$id_filter = '';
$where = '1=1 ';

if(isset($_GET)){

    if(isset($_GET['id']) && !is_null($_GET['id']) && !empty($_GET['id'])) {
        $id_filter = " AND i.ID IN ('".str_replace(",", "','", $_GET["id"])."')";
    }

    if(isset($_GET['view']) && !is_null($_GET['view']) && !empty($_GET['view'])){
        switch ($_GET['view']) {
            case 'index':
                if(isset($_GET['where_clause']) && !is_null($_GET['where_clause']) && !empty($_GET['where_clause'])) {
                    $where .= " AND ".$_GET['where_clause']." ";
                }

                if(isset($_GET['status']) && !is_null($_GET['status']) && !empty($_GET['status'])) {
                    $where .= " AND status_code = '".$_GET['status']."' ";
                }

                if (isset($_GET['Keyword']) && !is_null($_GET['Keyword']) && !empty($_GET['Keyword'])) {
                    $keyword = $_GET['Keyword'];
                    $where .= " AND(i.forename like '%$keyword%' OR i.surname like '%$keyword%' OR i.address like '%$keyword%' OR i.postcode like '%$keyword%' OR i.email like '%$keyword%'OR i.phone like '%$keyword%' OR i.lead_source like '%$keyword%') ";
                }

                if (isset($_GET['fuel_type']) && !is_null($_GET['fuel_type']) && !empty($_GET['fuel_type'])) {
                    $where .= " AND i.fuel_type = '" .$_GET['fuel_type']."' ";
                }

                if (isset($_GET['site_details']) && !is_null($_GET['site_details']) && !empty($_GET['site_details'])) {
                    $where .= " AND i.siteID = '" .$_GET['site_details']."' ";
                }

                if (isset($_GET['lead_source']) && !is_null($_GET['lead_source']) && !empty($_GET['lead_source'])) {
                    $where .= " AND i.lead_source = '" .$_GET['lead_source']."' ";
                }

                if (isset($_GET['insulation_type']) && !is_null($_GET['insulation_type']) && !empty($_GET['insulation_type']) ) {
                    $where .= " AND i.wall_insulation_type = '" .$_GET['insulation_type']."' ";
                }

                if (isset($_GET['benefits']) && !empty($_GET['benefits'])) {
                    $benefits = $_GET['benefits'];
                    if ($benefits == 'Yes') {
                        $where .= " AND benefits != 'No Benefits - NO' AND benefits != ' ' " ;
                    }
                    if ($benefits == 'No') {
                        $where .= " AND benefits = 'No Benefits - NO' OR benefits = ' ' " ;
                    }
                }

                if (isset($_GET['date_search']) && !is_null($_GET['date_search']) && !empty($_GET['date_search'])) {
                    $date = $_GET['date_search'];
                    if ($date == 'today'){
                        $where .= " AND (insert_time > DATE_SUB(NOW(), INTERVAL 1 DAY)) ";
                    }
                    elseif ($date == 'yesterday'){
                        $where .= " AND (DATE(insert_time) = SUBDATE(CURRENT_DATE(), INTERVAL 1 DAY)) ";
                    }
                    elseif ($date == '7days'){
                        $where .= " AND (insert_time > DATE_SUB(NOW(), INTERVAL 1 WEEK)) ";
                    }
                    elseif ($date == 'curr_month'){
                        $where .= ' AND (YEAR(insert_time) = YEAR(CURRENT_DATE()) AND MONTH(insert_time) = MONTH(CURRENT_DATE())) ';
                    }
                    elseif ($date == '40days'){
                        $where .= " AND (insert_time > DATE_SUB(NOW(), INTERVAL 40 DAY)) ";
                    }
                    elseif ($date == '60days'){
                        $where .= " AND (insert_time > DATE_SUB(NOW(), INTERVAL 60 DAY)) ";
                    }
                    elseif ($date == 'prev_month'){
                        $where .= ' AND (YEAR(insert_time) = YEAR(CURRENT_DATE()) AND MONTH(insert_time) = MONTH(CURRENT_DATE()) -1) ';
                    }
                    elseif ($date == 'curr_year'){
                        $where .= ' AND (YEAR(insert_time) = YEAR(CURRENT_DATE()))';
                    }
                    elseif ($date == 'prev_year'){
                        $where .= ' AND (YEAR(insert_time) = YEAR(CURRENT_DATE()) -1)';
                    }
                    elseif ($date == 'all_time'){
                        $where .= ' AND (1 = 1 )';
                    }
                }

                if (!empty($_GET['from']) and !empty($_GET['to'])) {
                    $from = $_GET['from'];
                    $to = $_GET['to'];
                    $where .= " AND(insert_time between str_to_date('$from','%m/%d/%Y') AND str_to_date('$to','%m/%d/%Y'))";
                }

                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno  AS 'Telephone 2',
                            i.email AS 'Email',
                            ifnull(lse.status_code,'NEW') AS 'Status Code',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes  AS 'Notes'
                         FROM insulations i
                            LEFT OUTER JOIN lead_status_event lse
                            ON i.ID = lse.id
                         WHERE $where".$id_filter." ORDER BY i.ID DESC";

                break;

            case 'new':
                $query = "SELECT *
                          FROM
                            (SELECT
                              i.ID AS 'Job No',
                              Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                              CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                              i.address AS 'Address',
                              i.postcode AS 'Post Code',
                              i.phone AS 'Telephone 1',
                              i.altno AS 'Telephone 2',
                              i.email AS 'Email',
                              ifnull(lse.status_code,'NEW') AS 'Status Code',
                              i.fuel_type AS 'Primary Source Of Heating',
                              i.boiler_period AS 'Age of the Boiler',
                              i.property_type AS 'Type of Property',
                              i.propertyPeriod AS 'Property Built (Approximately)',
                              i.wall_insulation_type AS 'Required Insulation Type',
                              i.roof_insulation_type AS 'No.s of Bedrooms',
                              i.owner AS 'Owner or Tenant',
                              i.benefits AS 'Benefits Received (By Occupier)',
                              i.notes AS 'Notes'
                            FROM insulations i
                            LEFT OUTER JOIN lead_status_event lse
                            ON i.ID = lse.id
                            WHERE $where".$id_filter.") new_lead
                          WHERE `Status Code` = 'NEW' ORDER BY `Job No` DESC";

            break;

            case 'completed':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'
                          FROM insulations i, lead_status_event lse
                          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='COMP' ORDER BY i.ID DESC";

                break;

            case 'installation':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'
				          FROM insulations i, lead_status_event lse
				          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='INST' ORDER BY i.ID DESC";

                break;

            case 'assessment':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'
                          FROM insulations i, lead_status_event lse
                          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='ASMT' ORDER BY i.ID DESC";

                break;

            case 'qualified':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'  
				          FROM insulations i, lead_status_event lse
				          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='QULI' ORDER BY i.ID DESC";

                break;

            case 'ready':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'
                          FROM insulations i, lead_status_event lse
                          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='RDTB' ORDER BY i.ID DESC";

                break;

            case 'visit':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'
                          FROM insulations i, lead_status_event lse
                          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='VC' ORDER BY i.ID DESC";

                break;

            case 'unable':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'
                          FROM insulations i, lead_status_event lse
                          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='UTA' ORDER BY i.ID DESC";

                break;

            case 'call':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'
                          FROM insulations i, lead_status_event lse
                          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='CBNR' ORDER BY i.ID DESC";

                break;

            case 'reminder':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'
                          FROM insulations i, lead_status_event lse
                          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='REM' ORDER BY i.ID DESC";

                break;

            case 'incomplete':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'  
				          FROM insulations i, lead_status_event lse
				          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='ICOM' ORDER BY i.ID DESC";

                break;

            case 'rejection':
                $query = "SELECT
                             i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'
                          FROM insulations i, lead_status_event lse
                          WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='RJCT' ORDER BY i.ID DESC";

                break;

            case 'rejection_after':
                $query = "SELECT
                            i.ID AS 'Job No',
                            Date_format(i.insert_time,'%d-%m-%Y %r') AS 'Date & Time',
                            CONCAT_WS(' ', i.title, i.forename, i.surname) AS 'Customer Name',
                            i.address AS 'Address',
                            i.postcode AS 'Post Code',
                            i.phone AS 'Telephone 1',
                            i.altno AS 'Telephone 2',
                            i.email AS 'Email',
                            i.fuel_type AS 'Primary Source Of Heating',
                            i.boiler_period AS 'Age of the Boiler',
                            i.property_type AS 'Type of Property',
                            i.propertyPeriod AS 'Property Built (Approximately)',
                            i.wall_insulation_type AS 'Required Insulation Type',
                            i.roof_insulation_type AS 'No.s of Bedrooms',
                            i.owner AS 'Owner or Tenant',
                            i.benefits AS 'Benefits Received (By Occupier)',
                            i.notes AS 'Notes'
                        FROM insulations i,
                          lead_status_event lse
                        WHERE $where".$id_filter." AND i.ID = lse.id AND lse.status_code='RAA'
                        ORDER BY i.ID DESC";

                break;
        }
    }


    /*echo $query;
    die();*/
    
    $result = mysqli_query($conn, $query);

    $fields;

    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Simple');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);

    $rowCount = 1;

    $column = 'A';
    for ($i = 0; $i < mysqli_num_fields($result); $i++) {
        $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, mysqli_fetch_field_direct($result, $i)->name);

        // Make bold cells
        $objPHPExcel->getActiveSheet()->getStyle($column.$rowCount)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle($column.$rowCount)->applyFromArray( array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => '82CAFF')
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);

        $column++;
    }
    //end of adding column names

    //start while loop to get data
    $rowCount = 2;
    while($row = mysqli_fetch_row($result)) {
        $column = 'A';
        for($j = 0; $j < mysqli_num_fields($result); $j++) {
            if(!isset($row[$j])) {
                $value = NULL;
            } elseif ($row[$j] != "") {
                $value = strip_tags($row[$j]);
            } else {
                $value = "";
            }

            $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
            $column++;
        }
        $rowCount++;
    }

    $objPHPExcel->getActiveSheet()->freezePane('A2');

    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Export_ApexGreen.xls"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    mysqli_close($conn);

    exit;
} else {
    echo 'You cannot access this file directly! Taking you back to home...';
    header('location: index.php');
}