<?php
session_start();

spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/php_ajax_crud/class/'.$class.'.classes.php';
});

require_once 'function.php';
?>
