<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><tr class="<?php if (((isset($this->scope["index"]) ? $this->scope["index"] : null) % 2)) {
?>even<?php 
}
else {
?>odd<?php 
}?>">
    <td><?php echo $this->scope["row"]["id"];?></td>
    <td><?php echo $this->scope["row"]["name"];?></td>
    <td><?php echo $this->scope["row"]["age"];?></td>
    <td><?php 
$_fh0_data = (isset($this->scope["row"]["lotto_numbers"]) ? $this->scope["row"]["lotto_numbers"]:null);
$this->globals["foreach"]['default'] = array
(
	"iteration"		=> 1,
	"last"		=> null,
	"total"		=> $this->count($_fh0_data),
);
$_fh0_glob =& $this->globals["foreach"]['default'];
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['val'])
	{
		$_fh0_glob["last"] = (string) ($_fh0_glob["iteration"] === $_fh0_glob["total"]);
/* -- foreach start output */

echo $this->scope["val"];

/* -- implode */
if (!$_fh0_glob["last"]) {
	echo ", ";
}
/* -- foreach end output */
		$_fh0_glob["iteration"]+=1;
	}
}?></td>
</tr>
<tr class="<?php if (((isset($this->scope["index"]) ? $this->scope["index"] : null) % 2)) {
?>even<?php 
}
else {
?>odd<?php 
}?>">
    <td colspan="4">
        <h4>Lead</h4>
        <p><?php echo $this->scope["row"]["lead"];?></p>
        <h4>Description</h4>
        <p><?php echo $this->scope["row"]["description"];?></p>
        <br/>
    </td>
</tr><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>