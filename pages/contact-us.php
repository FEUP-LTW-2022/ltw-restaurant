<?php
session_start();
require_once(__DIR__ .'/../templates/elements.tpl.php');
require_once(__DIR__ .'/../templates/contact-us.tpl.php');
require_once(__DIR__ .'/../templates/static.tpl.php');

//realEmailSender(); // probably working, not tested
fakeEmailSender();

drawHeader();
drawContactUs();
drawFooter();