<?php

$db = array(
    // development database (default)
    'dev' => array(
        'driver' => 'mysql',
        'hostname' => 'localhost',
        'username' => 'tpl_test',
        'password' => 'tpl_test',
        'database' => 'tpl_test'
    ),
    //production database (live website)
    'prod' => array(
        'driver' => '',
        'hostname' => '',
        'username' => '',
        'password' => '',
        'database' => ''
    )
);

// -- end