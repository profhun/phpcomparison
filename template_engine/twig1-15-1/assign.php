<?php
	
require_once 'lib/Twig/Autoloader.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem($engine_path . '/tpl');

$twig = new Twig_Environment($loader, array(
	'cache' => $engine_path . '/cache',
	//'autoescape' => false,
));

$template = $twig->loadTemplate('template_assign.html');

$html = $template->render(array('template_data'=>$template_data));