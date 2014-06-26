<?php
/* template head */
if (function_exists('\Dwoo\Plugins\Functions\functionInclude')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?><!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>PHP Template Engine Comparison - Test</title>
        <style>
            .even{ background: #f8f8f8; }
            .odd{ background: #d8d8d8; }
        </style>
    </head>
    <body>
        <h1>Template test</h1>
        <br/>
        <?php echo \Dwoo\Plugins\Functions\functionInclude($this, '__table.tpl', null, null, null, '_root', null);?>
    </body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>