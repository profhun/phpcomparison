<?php

/**
 *  Benchmark
 *  ---------
 *  This benchmark is realized by Federico Ulfo. The library are part of the RainFramework.
 *  Distributed under MIT license http://www.opensource.org/licenses/mit-license.php
 */

error_reporting(E_ALL ^ E_NOTICE);

session_start();
	
require "vendor/autoload.php";

require_once "library/functions.php";
require_once "library/config.php";

use Rain\DB;

$db = new DB();
$db->init();

//install / reset?
if(isset($_GET['reset']) || !isset($_SESSION['working'])) {
	db_install($db);
    $_SESSION['n_index'] = 0;
}

//no more installs!
$_SESSION['working'] = 1;

$n_test_for_template = $n_values[$_SESSION['n_index']];

$vars = $db->getRow("SELECT * FROM template_test_counter");

$template_number    = $vars['template_number'];
$test_number        = $vars['test_number'];
$execution_number   = $vars['execution_number'];

$myvar              = array();
$n                  = $n_values[$test_number];
$template_engine    = $template_list[$template_number];
$engine_path        = 'template_engine/' . $template_engine;
	
for($i = 0; $i < $n; $i++) {
	/*if($test == 'loop') {
		$myvar[] = array(
			'id' => $i,
			'name' => "<b>longname$i</b>",
			'param1' => $i,
			'param2' => 'eiho',
			'param3' => '<h1>hello world</h1>'
		);
	} else {*/
		$myvar["var$i"] = '<b>blah!</b>';
	//}
}	

// start benchmark	
$start          = microtime(true);
$memstart       = memory_get_usage();
$memstart_peak  = memory_get_peak_usage();

require_once 'template_engine/' . $template_engine . "/assign.php"; 
	
$mem            = memory_get_usage() - $memstart;
$mem_peak       = memory_get_peak_usage() - $memstart_peak;
$exc            = round((microtime(true) - $start) * 1000000);

// stop benchmark
$html = '<h1>Template speed test</h1>
		template: <b>'.$template_engine.'</b><br/>
		test cycle: <b>'.($execution_number+1).'/'.$n_test_for_template.'</b><br/>
		n variables: <b>'.$n.'</b><br/>
		execution time: <b>'.$exc.'</b><br/>
		memory used: <b>'.$mem.'</b><br/>
		memory used peak: <b>'.$mem_peak.'</b><br/>
		';

//save to db
$db->query("INSERT INTO template_benchmark (template_engine, n, execution_time, memory, memory_peak) 
                                   VALUES (:template_engine, :n, :exc, :mem, :mem_peak)",
           array(':template_engine'=>$template_engine, ':n'=>$n, ':exc'=>$exc, ':mem'=> $mem, ':mem_peak'=> $mem_peak)
         );

//+1 cycle
$execution_number++;

//end point check?
if($execution_number >= $n_test_for_template) {
	$execution_number = 0;
	$template_number++;
	if($template_number >= count($template_list)) {
		$template_number = 0;
		$test_number++;
		if($test_number >= count($n_values)) {
			
				$template_number = $test_number = $execution_number = 0;
				$db->query("UPDATE template_test_counter 
                                           SET test=:test, 
                                               template_number=:template_number, 
                                               test_number=:test_number,
                                               execution_number=:execution_number",
                                        array( 
                                               ':template_number'=> $template_number, 
                                               ':test_number'=>$test_number,
                                               ':execution_number'=>$execution_number,)
                                        );
                                        
                $_SESSION['n_index']++;
				header("Refresh: 0.1; url=index.php");
				exit;
			/*
				header("Refresh: 0.1; url=save.php");
				$db->query("UPDATE template_test_counter 
                                           SET 
                                               template_number=:template_number,
                                               test_number=:test_number,
                                               execution_number=:execution_number",
                                        array( 
                                              ':template_number'=>$template_number,
                                              ':test_number'=>$test_number,
                                              ':execution_number'=>$execution_number,
                                            ));
				$template_number = $test_number = $execution_number = 0;
				unset($_SESSION['working']);
				exit;
			*/
		}
	}
}

$db->query("UPDATE template_test_counter 
           SET 
               template_number  = :template_number,
               test_number      = :test_number,
               execution_number = :execution_number, 
               time=UNIX_TIMESTAMP()",
          array(
               'template_number'    => $template_number,
               'test_number'        => $test_number,
               'execution_number'   => $execution_number)
        );

header("Refresh: 0.1; url=test.php");
echo $html;