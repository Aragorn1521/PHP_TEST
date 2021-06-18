<?php
header('Content-type: json/application');
define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/category.php');
require_once (ROOT.'/components/autoload.php');
//http://api5/filter/page=8/limit=100/pipeline-MAIN_MATERIAL,id,welding-TYPE_OF_WELDS - 
//пример вывода отфильтрованных по столбцам таблицы данных


//http://api5/posts/page=8/limit=100 - пример вывода данных


/*
 * Задание 1 - создание Базы данных,создание таблицы и ее заполнение из sql файлов
 */
$databaseCreation = new DatabaseCreation();
$databaseCreation->DbCreation();
$databaseCreation->CreatingATable();
$databaseCreation->PopulatingTheTable();


$UrlHandling = new UrlHandling();
$UrlHandling->getUrl();
$lim = $UrlHandling->TwoParamsid();
$limParam = $UrlHandling->OneParamsid();
$pageParam = $UrlHandling->OneParamsPage();
$oneOption = $UrlHandling->OneOption();


$page = $UrlHandling->TwoParamsPage();



$getPosts = new getPosts();
$post = $getPosts->Posts($lim,$page);
$speakers = $getPosts->giveSpeakers();
$getCount = $getPosts->getCount();
$pages = $UrlHandling->TwoPage();

$proverka = $getPosts->complianceCheck($oneOption, $category);

$postssList = $getPosts->PostsList($lim, $page);
$myFilter = $getPosts->myFilter($postssList, $proverka);




$errors = new Errors();
$err = $errors->Err($limParam, $pageParam, $pages, $lim, $getCount);

$responce = new FormationOfAResponse();
$responce->Responce($post, $speakers, $err,$myFilter);





