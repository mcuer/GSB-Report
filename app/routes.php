<?php

use Symfony\Component\HttpFoundation\Request;

// Home page
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
});

// Details for a drug
$app->get('/drugs/{id}', function($id) use ($app) {
    $drug = $app['dao.drug']->find($id);
    return $app['twig']->render('drug.html.twig', array('drug' => $drug));
});

// List of all drugs
$app->get('/drugs/', function() use ($app) {
    $drugs = $app['dao.drug']->findAll();
    return $app['twig']->render('drugs.html.twig', array('drugs' => $drugs));
});

// Search form for drugs
$app->get('/drugs/search/', function() use ($app) {
    $families = $app['dao.family']->findAll();
    return $app['twig']->render('drugs_search.html.twig', array('families' => $families));
});

// Results page for drugs
$app->post('/drugs/results/', function(Request $request) use ($app) {
    $familyId = $request->request->get('family');
    $drugs = $app['dao.drug']->findAllByFamily($familyId);
    return $app['twig']->render('drugs_results.html.twig', array('drugs' => $drugs));
});
// List of all practiciens
$app->get('/practiciens/', function() use ($app) {
    $practiciens = $app['dao.practiciens']->findAll();
    return $app['twig']->render('practiciens.html.twig', array('practiciens' => $practiciens));
});
// Details for a practiciens
$app->get('/practiciens/{id}', function($id) use ($app) {
    $practicien = $app['dao.practicien']->find($id);
    return $app['twig']->render('practiciens.html.twig', array('practiciens' => $practicien));
});
