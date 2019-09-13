<?php

use App\Http\Controllers\spotifyController;
use Laravel\Lumen\Routing\Router;

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'categories'], function (Router $router) {
    $router->get('/', [
        'uses' => 'SpotifyController@getCategories'
    ]);
});

$router->group(['prefix' => 'releases'], function (Router $router) {
    $router->get('/', [
        'uses' => 'SpotifyController@getNewReleases'
    ]);
});
