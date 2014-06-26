<?php

require 'lib/h2o.php';

$h2o = new h2o('template_assign.html',array(
    'searchpath'    => __DIR__ . '/templates/',
    'cache'         => true,
    'cache_dir'     => __DIR__ . '/cache/',
    
));

$page = array(
  'template_data' => $template_data
);


# render your awesome page
apc_store('html_output',$h2o->render($page));
