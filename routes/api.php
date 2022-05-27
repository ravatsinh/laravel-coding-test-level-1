<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->resource('v1/events', \App\Http\Controllers\Api\V1\EventsController::class);
    //$api->put('v1/events/{id}', [\App\Http\Controllers\Api\V1\EventsController::class, 'createUpdateEvent']);
    $api->get('v1/events/active-events', [\App\Http\Controllers\Api\V1\EventsController::class, 'activeEvents']);

});
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
