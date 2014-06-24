<?php

error_reporting(E_ALL ^ E_NOTICE);

require "vendor/autoload.php";

require_once "library/functions.php";
require_once "library/config.php";

$template_engine = $_GET['engine'] ? $_GET['engine'] : 'php';
$engine_path = 'template_engine/' . $template_engine;

$n = 20;
$template_data = create_test_data_structure($n,'apc');

//load template test
require_once 'template_engine/' . $template_engine . "/assign.php";

//display
echo $html;