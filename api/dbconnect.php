<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

define('DBHOST', 'database.lcn.com');
define('DBUSER', 'LCN377861_apex');
define('DBPASS', '123456apex');
define('DBNAME', 'apexgreen_co_uk_db');

$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if(!$con) {
    die('Error connecting to database');
}

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}