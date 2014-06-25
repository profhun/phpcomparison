<?php

#------------------------------------
#   Configuration 
#------------------------------------

global $template_list_package_size, $template_website;

// number of execution test for each template
$n_test_for_template = 10;

// number of variables assigned in each test
$n_values = array( 6000, 2000 ,200, 20 );

// get the list of the templates
$template_list = array(
	'blade',
    'php',
	'h2o',
	//'phppe2',
	//'phppe3',
	//'dwoo',
	'smarty',
	//'twig12',
	//'template_lite2',
);

$template_list_version = array(
	'php'            => phpversion(),
	'blade'          => 'latest',
	'h2o'            => 'latest',
	//'phppe2'         => '',
    //'phppe3'         => '',
	//'dwoo'             => '1.1.1',
	'smarty'           => '3.1.18',
	//'twig12'           => '1.12.2',
	//'template_lite2'   => '',
);

$template_list_package_size = array(
	'php'            => '1.3 KB',
	'blade'          => '421 KB',
	'h2o'            => '',
	//'phppe2'         => '',
    //'phppe3'         => '',
	//'dwoo'             => '848 KB',
	'smarty'           => '1100 KB',
	//'twig12'           => '2000 KB',
	//'template_lite2'   => '',
);

$template_website = array(
	'php'              => 'http://php.net',
	'blade'            => 'https://github.com/PhiloNL/Laravel-Blade',
	'h2o'              => '',
	//'phppe2'         => '',
    //'phppe3'         => '',
	//'dwoo'             => 'http://dwoo.org',
	'smarty'           => 'http://www.smarty.net/',
	//'twig12'           => 'http://twig-project.org',
	//'template_lite2'   => '',
);

