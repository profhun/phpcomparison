<?php
    
    date_default_timezone_set('Europe/Budapest');
    
    function timer(){
        $microtime = explode(' ', microtime());
        return $microtime[1] . substr($microtime[0], 1);
    }
    
    function msec( $m ){
        return round($m) . " &mu;s";
    }
    
    function format_memory( $size ){
        if( $size > 0 ){
            $unim = array("B","KB","MB","GB","TB","PB");
            for( $i=0; $size >= 1024; $i++ )
                $size = $size / 1024;
            return round( $size, 2 ) . " ".$unim[$i];
        }
    }
    
    function get( $key = null ){
        if( isset($_GET[$key]) ){
            if( is_array( $_GET[$key] ) ){

                $g = array();
                foreach( $_GET[$key] as $k => $v )
                    $g[$k] = addslashes($v);
                return $g;
            }
            else
                return addslashes( $_GET[$key] );
        }

    }
    
    function getDirectorySize($tpl){
        global $template_list_package_size;
        return $template_list_package_size[$tpl];
    }
  
    function db_install($db) {
        //log table
        $db->query("CREATE TABLE IF NOT EXISTS `template_benchmark` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `template_engine` varchar(255) NOT NULL,
            `test` varchar(60) NOT NULL,
            `n` int(11) NOT NULL,
            `execution_time` int(11) NOT NULL,
            `memory` int(11) NOT NULL,
            `memory_peak` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
        //counter table
        $db->query("CREATE TABLE IF NOT EXISTS `template_test_counter` (
            `test` varchar(30) NOT NULL,
            `template_number` int(11) NOT NULL,
            `test_number` int(11) NOT NULL,
            `execution_number` int(11) NOT NULL,
            `time` int(11) NOT NULL,
            PRIMARY KEY (`test`,`template_number`,`test_number`,`execution_number`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
        //clean up
        $db->query("TRUNCATE TABLE template_benchmark");
        $db->query("TRUNCATE TABLE template_test_counter");
        $db->query("INSERT INTO template_test_counter VALUES ('assign',0,0,0,0)");
        //session reset
        $_SESSION['template_number'] = $_SESSION['test_number'] = $_SESSION['execution_number'] = 0;
    }

    function create_test_data_structure($data_count,$store_engine = 'apc'){
        //lipsum words
        $lipsum_words = array(
            'phasellus','quam','elit','euismod','eget','imperdiet','sit','amet','tristique','consequat','odio','ut','non','lectus','dapibus','auctor','velit','sit','amet','lobortis','quam','in','hac','habitasse','platea','dictumst','aenean','eleifend','pretium','felis','et','rhoncus','ut','vitae','orci','sit','amet','eros','feugiat','bibendum','in','ultricies','fringilla','tortor','quis','consectetur','felis','maecenas','diam','sapien','eleifend','ut','dui','eget','ullamcorper','tempus','turpis','donec','interdum','magna','sed','augue','viverra','aliquet','proin','ante','quam','ultrices','sit','amet','porta','sit','amet','bibendum','ac','diam','phasellus','et','iaculis','ante','ac','tempus','purus','nullam','non','purus','nec','ligula','mollis','varius','class','aptent','taciti','sociosqu','ad','litora','torquent','per','conubia','nostra'
        );
        
        $data = array();
        //create test data structure
        for($i = 0; $i < $data_count; $i++){
                
            //create lotto numbers
            $lotto_numbers = array();
            while(count($lotto_numbers) < 5){
                $new_number = rand(1,90);
                if(!in_array($new_number,$lotto_numbers)){
                    $lotto_numbers[] = $new_number; 
                }
            }
            asort($lotto_numbers);
            
            //create name
            $name = $lipsum_words[rand(0,99)].' '.$lipsum_words[rand(0,99)];
            
            //create lead
            $word_num = rand(30,50);
            $lead = $lipsum_words[rand(0,99)];
            for($s = 0; $s < $word_num; $s++){
                 $lead .= " " . $lipsum_words[rand(0,99)];
            }
            
            //create description
            $word_num = rand(100,150);
            $description = $lipsum_words[rand(0,99)];
            for($s = 0; $s < $word_num; $s++){
                 $description .= " " . $lipsum_words[rand(0,99)];
            }
            
            
            $data[] = array(
                'id'            => $i,
                'name'          => $name,
                'age'           => rand(10,88),
                'lead'          => $lead,
                'description'   => $description,
                'lotto_numbers' => $lotto_numbers, 
            );
        }
        
        //store in memcache or apc or database
        switch($store_engine){
            case "apc":
                apc_store('cache',$data);
            break;
            
            case "memcache":
                //todo
            break;
            
            case "db":
                //todo
            break;
        }
	    
	    return $data;
	}
	
	function load_data_structure(){
	    return apc_fetch('cache');
	}
	
	
	