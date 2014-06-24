<?php

ob_start();
require_once 'tpl/template_assign.php';
apc_store('html_output',ob_get_clean());
//ob_end_clean();