<?php

$router = new \Bramus\Router\Router();
$router->setNamespace('App\Controllers');

// Homepage
$router->get('/', 'ViewController@HomePage');

// Upload image
$router->get('/upload', 'ViewController@UploadPage');
$router->post('/upload', 'UploadController@ImageUpload');

// Authentication
$router->before('GET', '/login', 'AuthController@Authenticated');
$router->get('/login', 'ViewController@LoginPage');
$router->post('/sign', 'AuthController@SignIn');

// Searching
$router->get('/search', 'ViewController@SearchPage');
$router->post('/search', 'SearchController@SearchItem');

// Dashboard
$router->before('GET', '/admin', 'AuthController@CheckAuth');
$router->get('/admin', 'AdminController@Index');
$router->get('/logout', 'AuthController@Logout');

$router->post('/admin/article', 'AdminController@CreateArticle');
$router->put('/admin/article', 'AdminController@UpdateArticle');
$router->delete('/admin/article(/\w+)', 'AdminController@RemoveArticle');
$router->get('/admin/article(/\w+)', 'AdminController@GetArticle');

// Navigation
$router->get('/profil/([a-z0-9_-]+)', 'PageController@GetPages');
$router->get('/pelayanan/([a-z0-9_-]+)', 'PageController@GetPages');
$router->get('/publikasi/([a-z0-9_-]+)', 'PageController@GetPages');

$router->post('/auth', 'AuthController@SignIn');

$router->set404(function () {
    header('location: /');
});

$router->run();
