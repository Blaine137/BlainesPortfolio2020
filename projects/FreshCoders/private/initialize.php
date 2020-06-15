<?php
session_start(); //creates a session
ob_start(); //starts output buffering
require_once('db_connect.php');
require_once('query_functions.php');
require_once('functions.php');

$connection = db_connect(); //connection of database

?>