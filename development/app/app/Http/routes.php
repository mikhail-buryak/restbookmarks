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

/**
 * Routes for resource comment
 */
$app->get('comment', 'CommentsController@all');
$app->get('comment/{id}', 'CommentsController@get');
$app->post('comment', 'CommentsController@add');
$app->put('comment/{id}', 'CommentsController@put');
$app->delete('comment/{id}', 'CommentsController@remove');

/**
 * Routes for resource bookmark
 */
$app->get('bookmark', 'BookmarksController@all');
$app->get('bookmark/{id}', 'BookmarksController@get');
$app->post('bookmark', 'BookmarksController@add');
$app->put('bookmark/{id}', 'BookmarksController@put');
$app->delete('bookmark/{id}', 'BookmarksController@remove');
