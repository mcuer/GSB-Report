<?php

// Register global error and exception handlers
use Symfony\Component\Debug\ErrorHandler;
ErrorHandler::register();
use Symfony\Component\Debug\ExceptionHandler;
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// Register services.
$app['dao.family'] = $app->share(function ($app) {
    return new GSB\DAO\FamilyDAO($app['db']);
});
$app['dao.drug'] = $app->share(function ($app) {
    $drugDAO = new GSB\DAO\DrugDAO($app['db']);
    $drugDAO->setFamilyDAO($app['dao.family']);
    return $drugDAO;
});
$app['dao.practicien'] = $app->share(function ($app) {
    $practicienDAO = new GSB\DAO\PracticienDAO($app['db']);
    return $practicienDAO;
});
$app['dao.practiciens'] = $app->share(function ($app) {
    $practicienDAO = new GSB\DAO\PracticienDAO($app['db']);
    return $practicienDAO;
});