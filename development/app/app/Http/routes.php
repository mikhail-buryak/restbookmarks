<?php

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
    return $app->version();
});

// Routes api
$app->group(['prefix' => 'api', 'namespace' => 'App\Http\Controllers'], function () use ($app) {

    // Routes for resource bookmark
    $app->get('bookmark', 'BookmarksController@getBookmark');
    $app->get('bookmark/history', 'BookmarksController@getHistory');
    $app->post('bookmark', 'BookmarksController@postBookmark');

    // Routes for resource comment
    $app->post('comment/bookmark/{id}', 'CommentsController@postComment');
    $app->put('comment/{id}', 'CommentsController@putComment');
    $app->delete('comment/{id}', 'CommentsController@deleteComment');
});