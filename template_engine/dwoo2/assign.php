<?php
// Include the main class (it should handle the rest on its own)
require 'lib/Dwoo/Autoloader.php';
Dwoo\Autoloader::register();

// Create the controller, this is reusable
$dwoo = new Dwoo\Core();
$dwoo->debugMode = false;

$tpl = new Dwoo\Template\File(__DIR__ . '/template/template_assign.tpl');

// Create a data set, if you don't like this you can directly input an
// associative array in $dwoo->output()
$data = new Dwoo\Data();
// Fill it with some data

// index
$data->assign('template_data', $template_data);

apc_store('html_output',$dwoo->get($tpl, $data));