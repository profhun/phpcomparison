<?php

#------------------------------------
#   Configuration
#------------------------------------

global $template_list_package_size, $template_website;

// number of execution test for each template
$n_test_for_template = 10;

// number of variables assigned in each test
$n_values = array( 6000, 2000 ,200, 100, 50, 20 );

// get the list of the templates
$template_list = array(
	'blade',
    'php',
	'h2o',
	//'phppe2',
	//'phppe3',
	'smarty',
	'twig1-15-1',
	'dwoo2',
	//'twig12',
	//'template_lite2',
);

$template_list_version = array(
	'php'            => phpversion(),
	'blade'          => 'latest',
	'h2o'            => 'latest',
	//'phppe2'         => 'latest',
    //'phppe3'         => '',
	'smarty'           => '3.1.18',
	'twig1-15-1'       => '1.15.1',
	'dwoo2'            => '2 beta',
	//'twig12'           => '1.12.2',
	//'template_lite2'   => '',
);

$template_list_package_size = array(
	'php'              => '1.3 KB',
	'blade'            => '421 KB',
	'h2o'              => '',
	//'phppe2'         => '54 KB',
    //'phppe3'         => '',
	'smarty'           => '1100 KB',
	'twig1-15-1'       => '405 KB',
	'dwoo2'            => '450 KB',
	//'twig12'           => '2000 KB',
	//'template_lite2'   => '',
);

$template_website = array(
	'php'              => 'http://php.net',
	'blade'            => 'https://github.com/PhiloNL/Laravel-Blade',
	'h2o'              => '',
	//'phppe2'           => 'http://phppe.turdus.hu',
    //'phppe3'         => '',
	'smarty'           => 'http://www.smarty.net/',
	'twig1-15-1'       => 'http://twig.sensiolabs.org/',
	'dwoo2'            => 'https://github.com/emulienfou/dwoo/',
	//'twig12'           => 'http://twig-project.org',
	//'template_lite2'   => '',
);

