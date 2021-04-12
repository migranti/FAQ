<?php

// Errors reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// sesija nije potrebna
session_start();

// Konfiguracija
require_once('./app/config/config.php');

// Autoload - Composer
 
require_once __DIR__ . '/vendor/autoload.php';

// Inicijalizacija
$app = new Core\App();
