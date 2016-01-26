<?php

use \Illuminate\Http\Request;
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

$app->get('/', function () use ($app) {
    return 'List API by @ashleyhindle with Lumen';
});

$app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers'], function($app) {
    $app->get('list','ListController@all');

    $app->post('list','ListController@create');
    $app->post('list/{id}/item','ListController@createItem'); // TODO: Check if this is what I want

    $app->get('list/{id}','ListController@read');
    $app->put('list/{id}','ListController@update');
    $app->delete('list/{id}','ListController@delete');
});