<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Config\Parameters;

$paths = array("github/php-mysql-with-doctrine/src/Fun/Entity/");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => Parameters::DB_DRIVER,
    'user'     => Parameters::DB_USER,
    'password' => Parameters::DB_PASSWORD,
    'dbname'   => Parameters::DB_NAME,
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);