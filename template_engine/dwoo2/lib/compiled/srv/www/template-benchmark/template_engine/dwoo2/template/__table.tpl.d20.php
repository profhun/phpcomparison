<?php
/* template head */
if (function_exists('\Dwoo\Plugins\Functions\functionInclude')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?><table style="border: 1px solid #444444; width: 800px;">
    <thead>
        <tr>
            <th width="10%">ID</th>
            <th width="40%">Name</th>
            <th width="10%">Age</th>
            <th width="40%">Lotto numbers</th>
        </tr>
    </thead>
    <tbody>
        <?php 
$_fh0_data = (isset($this->scope["template_data"]) ? $this->scope["template_data"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['index']=>$this->scope['row'])
	{
/* -- foreach start output */
?>

            <?php echo \Dwoo\Plugins\Functions\functionInclude($this, '__table_row.tpl', null, null, null, '_root', null);?>

        <?php 
/* -- foreach end output */
	}
}?>

    </tbody>
</table><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>