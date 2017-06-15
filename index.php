<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once "vendor/autoload.php";

use Config\Parameters;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Fun\Controller\HomepageController;

echo Parameters::SITE_PATH;

$paths = array("/path/to/entity-files");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => Parameters::DB_DRIVER,
    'user'     => Parameters::DB_USER,
    'password' => Parameters::DB_PASSWORD,
    'dbname'   => Parameters::DB_NAME,
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo "<br/>";
echo $uri;

$routes = [
    'home' => Parameters::SITE_PATH,
    'category' => [
        'add' => Parameters::SITE_PATH.'test/add',
        'list' => Parameters::SITE_PATH.'test/list',
        'edit' => Parameters::SITE_PATH.'test/edit'
    ],

];

// your pages
if ($routes['home'] === $uri) {
    $home = new HomePageController();
    $home->indexAction();
} elseif ($routes['test']['add'] === $uri) {
    $category = new TestController();
    $category->addAction();
}else {
    echo '<h1>Page not found</h1>';
}

/*$dql = "SELECT email FROM fos_user";
$query = $entityManager->createQuery($dql);
var_dump($query->getSQL());*/

$qb = $entityManager->createQueryBuilder();
$qb->select('u')->from('fos_user', 'u');
var_dump($qb->getDQL());