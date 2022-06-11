<?php
session_start();

include_once("database/account.class.php");
include_once("database/connection.php");
include_once ('templates/elements.tpl.php');
$db=getDatabaseConnection();

drawHeader();

drawFooter();