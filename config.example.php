<?php 
$db_name = 'estoque';
$db_host = '';
$db_user = '';
$db_pass = '';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
