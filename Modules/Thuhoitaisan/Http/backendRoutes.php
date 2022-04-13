<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/thuhoitaisan'], function (Router $router) {
    $router->bind('thuhoitaisan', function ($id) {
        return app('Modules\Thuhoitaisan\Repositories\ThuhoitaisanRepository')->find($id);
    });
    $router->get('thuhoitaisans', [
        'as' => 'admin.thuhoitaisan.thuhoitaisan.index',
        'uses' => 'ThuhoitaisanController@index',
        'middleware' => 'can:thuhoitaisan.thuhoitaisans.index'
    ]);
    $router->get('thuhoitaisans/create', [
        'as' => 'admin.thuhoitaisan.thuhoitaisan.create',
        'uses' => 'ThuhoitaisanController@create',
        'middleware' => 'can:thuhoitaisan.thuhoitaisans.create'
    ]);
    $router->post('thuhoitaisans', [
        'as' => 'admin.thuhoitaisan.thuhoitaisan.store',
        'uses' => 'ThuhoitaisanController@store',
        'middleware' => 'can:thuhoitaisan.thuhoitaisans.create'
    ]);
    $router->get('thuhoitaisans/{bangiaotaisan}/thuhoi', [
        'as' => 'admin.thuhoitaisan.thuhoitaisan.thuhoi',
        'uses' => 'ThuhoitaisanController@thuhoi'
    ]);
    $router->get('thuhoitaisans/{thuhoitaisan}/edit', [
        'as' => 'admin.thuhoitaisan.thuhoitaisan.edit',
        'uses' => 'ThuhoitaisanController@edit',
        'middleware' => 'can:thuhoitaisan.thuhoitaisans.edit'
    ]);
    $router->put('thuhoitaisans/{thuhoitaisan}', [
        'as' => 'admin.thuhoitaisan.thuhoitaisan.update',
        'uses' => 'ThuhoitaisanController@update',
        'middleware' => 'can:thuhoitaisan.thuhoitaisans.edit'
    ]);
    $router->delete('thuhoitaisans/{thuhoitaisan}', [
        'as' => 'admin.thuhoitaisan.thuhoitaisan.destroy',
        'uses' => 'ThuhoitaisanController@destroy',
        'middleware' => 'can:thuhoitaisan.thuhoitaisans.destroy'
    ]);
// append

});
