<?php 
session_start();

require_once 'config.php';

include_once 'helpers/redirect.php';

function autoLoadController($class)
{
    $filename = "lib/". $class. ".php";
	if (is_readable($filename)) {
		require_once($filename);
	}
}

spl_autoload_register("autoLoadController"); 

    