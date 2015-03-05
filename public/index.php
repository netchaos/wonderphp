<?php

define('DS', DIRECTORY_SEPERATOR);
define('ROOT', dirname(dirname(__FILE__)));

$url = $_GET['url'];

require(ROOT . DS . 'library' . DS . 'bootstrap.php');
