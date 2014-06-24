<?php

/**
 *  Benchmark
 *  ---------
 *  This benchmark is realized by Federico Ulfo. The library are part of the RainFramework.
 *  Distributed under MIT license http://www.opensource.org/licenses/mit-license.php
 */

 
    error_reporting(E_ALL);
	session_start();
    
    require "vendor/autoload.php";
	
    unset($_SESSION['working']);
    
	if(isset($_SESSION['working'])) {
		header("Refresh: 30; url=index.php");
		echo 'Benchmarking currently in progress. The results will appear here once the test has completed.' . "\n";
		exit();
	}

	require_once "library/functions.php";
	require_once "library/config.php";

    //$data = create_test_data_structure(10);
    //var_dump($data);

    use Rain\DB;
        
    DB::init();
	
	$summary = DB::getAll("
	                           SELECT template_engine AS name, 
                                      avg(execution_time) AS execution_time, 
                                      avg(memory) AS memory,
                                      avg(memory_peak) AS memory_peak
                               FROM template_benchmark 
                               WHERE 1
                               GROUP BY template_engine 
                               ORDER BY execution_time"
               );

    $last_update = DB::getField("SELECT time
                                 FROM template_test_counter 
                                 LIMIT 1");
                                 
    $last_update_date = date( "M d Y", $last_update );
    $last_update_time = date( "h:i A", $last_update );
    
    
    $template_tested = DB::getAll("
                                SELECT template_engine 
                                FROM template_benchmark 
                                WHERE 1
                                GROUP BY template_engine 
                                ORDER BY template_engine", 
                                null,
                                "template_engine", 
                                "template_engine"
                       );

    
	$rows = DB::getAllArray('
	                           SELECT template_engine, 
                                    n, 
                                    avg(execution_time) AS execution_time, 
                                    avg(memory) AS memory, 
                                    avg(memory_peak) AS memory_peak 
                               FROM template_benchmark 
                               WHERE 1
                               GROUP BY template_engine, n 
                               ORDER BY n, execution_time, template_engine'
            );
                          
	$template_show = DB::getAllArray("
	                                    SELECT template_engine, 
                                            avg(execution_time) AS execution_time 
                                        FROM template_benchmark 
                                        WHERE 1
                                        GROUP BY template_engine 
                                        ORDER BY n, execution_time, template_engine", 
                                        null,
                                        "template_engine",
                                        "template_engine"
                      );
	$nrows = DB::getAllArray("
	                           SELECT n 
                               FROM template_benchmark 
                               WHERE 1
                               GROUP BY n"
             );
?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Template Engine Comparison</title>
	<link href="graph/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>

    <div id="wrapper">

        <h1>PHP Template Engine Comparison</h1>
        <h3>Professional benchmark</h3>
        <br/>
        
        <div id="last_update">updated on <?php echo $last_update_date; ?> at <?php echo $last_update_time; ?></div>
        
        <p>
            This benchmark tests:
            <ul>
                <li>loops</li>
                <li>multiple level includes</li>
                <li>if ... else ... statements</li>
                <li>long text printings</li>
                <li>extreme memory usage</li>
            </ul>
        </p>
        <br/><br/>
		  <div id="selector">
		  	<form action="index.php">
		      <?php
                      
		      	$sel = "";
		    	foreach( $template_tested as $template ){
		    		if( isset($template_show[ $template ] ))
		    			$sel .= "template[".$template  . "]=on&";
		    		echo '<label for="'.$template.'">'.$template.'</label> <input type="checkbox" name="template['.$template.']" '. ( isset($template_show[ $template ]) ? 'checked="checked"':'' ) .'> &nbsp;&nbsp; ';
		    	}
		    ?>
		    &nbsp; &nbsp; &nbsp;	<input type="submit" value="Click to refresh">
		    </form>
		  </div>

  		<div class="graph">
  			<h2>Summary</h2>

			<table cellpadding="0" cellspacing="1">
				<tr>
					<td class="table_title">Test</td>
					<td class="table_title">tot. time</td>
					<td class="table_title">tot. memory</td>
					<td class="table_title">tot. memory peak</td>
					<td class="table_title">package size</td>
				</tr>
		
			<?php 
				global $template_website;
				foreach( $summary as $name => $res ){ 
					if( isset($template_show[$res['name']]) ){
				?>
			
				<tr>
					<td><?php echo '<a href="'.($template_website[$res['name']]).'" target="_blank">'.$res['name'] . '</a>'; ?>  <span class="comment"><? echo $template_list_version[$res['name']]; ?></span></td>
					<td><?php echo msec($res['execution_time']); ?></td>
					<td><?php echo format_memory($res['memory']); ?></td>
					<td><?php echo format_memory($res['memory_peak']); ?></td>
					<td><?php echo getDirectorySize($res['name']); ?></td>
				</tr>
			
			<?php } } ?>
			
			</table>

  		</div>

		<div class="graph">
			<h2>Execution Time</h2>
			<div class="graph_inner">
				<iframe id="graph2" src="graph/line.php?<?php echo $sel; ?>test=<?php echo $test; ?>" width="100%" height="350" style="border:0px;"></iframe>
			</div>
			<h2>Memory</h2>
			<div class="graph_inner">
				<iframe id="graph3" src="graph/line.php?<?php echo $sel; ?>type=memory" width="100%" height="350" style="border:0px;"></iframe>
			</div>
			<h2>Memory Peak</h2>
            <div class="graph_inner">
                <iframe id="graph3" src="graph/line.php?<?php echo $sel; ?>type=memory_peak" width="100%" height="350" style="border:0px;"></iframe>
            </div>

		</div>
		
		<div class="graph">
			<h2>Total average</h2>
			<div class="graph_inner">
				<div style="float:left;"><iframe src="graph/pie.php?<?php echo $sel; ?>" width="440" height="380" style="border:0px;"></iframe></div>
				<div style="float:right;"><iframe src="graph/pie.php?<?php echo $sel; ?>&type=memory" width="440" height="380" style="border:0px;"></iframe></div>
			</div>
		</div>
  
        <div id="copyright">
            changed by <a href="https:////github.com/profhun">PROFHUN</a>. original repo: <a href="https://github.com/rainphp/phpcomparison/">rainphp/phpcomparison</a>
        </div>
  
	</div>
	
	

        
	
</body>
</html>
