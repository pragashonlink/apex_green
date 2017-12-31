<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'database.lcn.com',
        'username' => 'LCN377861_apex',
        'password' => '123456apex',
        'dbname' => 'apexgreen_co_uk_db'
    ),

    'remember' => array(

    ),

    'session' => array(

    )
);

spl_autoload_register(function ($class){
    require_once '../classes/' . $class . '.php';
});