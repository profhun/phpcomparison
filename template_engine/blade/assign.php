<?php

require "lib/vendor/autoload.php";

require_once 'lib/src/Blade.php';

use Philo\Blade\Blade;

$views = __DIR__ . '/templates';
$cache = __DIR__ . '/compile';

$blade = new Blade($views, $cache);
apc_store('html_output',$blade->view()->make('template_assign',array('template_data'=>$template_data))->render());
