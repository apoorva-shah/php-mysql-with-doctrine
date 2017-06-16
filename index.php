<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once "vendor/autoload.php";

use Config\Parameters;

use Fun\Controller\HomepageController;

include 'bootstrap.php';

$config = new \Doctrine\ORM\Configuration();
$driverImpl = $config->newDefaultAnnotationDriver('github/php-mysql-with-doctrine/src/Fun/Entity/');

$tool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
$classes = array(
    $entityManager->getClassMetadata('Fun\Entity\Message'),
);
$tool->createSchema($classes);

/*$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

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
}*/

/*$dql = "SELECT email FROM fos_user";
$query = $entityManager->createQuery($dql);
var_dump($query->getSQL());*/

/*$qb = $entityManager->createQueryBuilder();
$qb->select('u')->from('fos_user', 'u');
var_dump($qb->getDQL());*/