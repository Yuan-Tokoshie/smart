<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|

*/


$router->get('/getCommunity/{id}', "Community@getCommunity");
$router->post('/newCommunity', 'Community@newCommunity');
$router->put('/updateCommunity', 'Community@updateCommunity');
$router->delete('/removeCommunity', 'Community@removeCommunity');

$router->get('/getArea/{community_id}/{id}','Area@getArea');
$router->post('/newArea','Area@newArea');
$router->put('/updateArea', 'Area@updateArea');
$router->delete('/removeArea','Area@removeArea');

$router->get('/getIcon/{id}',"Icon@getIcon");

$router->get('/getHome/{id}','Home@getHome');
$router->post('/newHome','Home@newHome');
$router->put('/updateHome','Home@updateHome');
$router->delete('/removeHome','Home@removeHome');

$router->get('/getFavorite/{type}','Favorite@getFavorite');
$router->post('/newFavorite','Favorite@newFavorite');
$router->delete('/removeFavorite','Favorite@removeFavorite');

$router->get('/getDevice/{community_id}','Device@getDevice');
$router->post('/newDevice','Device@newDevice');
$router->put('/updateDevice','Device@updateDevice');
$router->delete('/removeDevice','Device@removeDevice');

$router->get('/getIntegrate/{community_id}/{type}','Integrate@getIntegrate');
$router->post('/newIntegrate','Integrate@newIntegrate');
$router->delete('/removeIntegrate','Integrate@removeIntegrate');
$router->get('/getHomeSceneState/{scene_id}/{home_id}','Integrate@getHomeSceneState');
$router->get('/getHomeScriptState/{script_id}/{home_id}','Integrate@getHomeScriptState');

// 取得使用者
$router->get('/getUser/{id}','User@getUser');
$router->post('/changePassword','User@changePassword');
$router->get('/getUserHomeRole','User@getUserHomeRole');