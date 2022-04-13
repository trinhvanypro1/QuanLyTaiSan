<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/bangiaotaisan'], function (Router $router) {
    $router->bind('bangiaotaisan', function ($id) {
        return app('Modules\Bangiaotaisan\Repositories\BangiaotaisanRepository')->find($id);
    });
    $router->get('bangiaotaisans', [
        'as' => 'admin.bangiaotaisan.bangiaotaisan.index',
        'uses' => 'BangiaotaisanController@index',
        'middleware' => 'can:bangiaotaisan.bangiaotaisans.index'
    ]);
    $router->get('bangiaotaisans/create', [
        'as' => 'admin.bangiaotaisan.bangiaotaisan.create',
        'uses' => 'BangiaotaisanController@create',
        'middleware' => 'can:bangiaotaisan.bangiaotaisans.create'
    ]);
    $router->post('bangiaotaisans', [
        'as' => 'admin.bangiaotaisan.bangiaotaisan.store',
        'uses' => 'BangiaotaisanController@store',
        'middleware' => 'can:bangiaotaisan.bangiaotaisans.create'
    ]);
    $router->post('bangiaotaisans/selectNhanvien',[
        'as' => 'admin.bangiaotaisan.bangiaotaisan.selectNhanvien',
        'uses' => 'BangiaotaisanController@selectNhanvien',
        'middleware' => 'can:bangiaotaisan.bangiaotaisans.create'
    ]);

    $router->get('bangiaotaisans/{bangiaotaisan}/edit', [
        'as' => 'admin.bangiaotaisan.bangiaotaisan.edit',
        'uses' => 'BangiaotaisanController@edit',
        'middleware' => 'can:bangiaotaisan.bangiaotaisans.edit'
    ]);
    $router->put('bangiaotaisans/{bangiaotaisan}', [
        'as' => 'admin.bangiaotaisan.bangiaotaisan.update',
        'uses' => 'BangiaotaisanController@update',
        'middleware' => 'can:bangiaotaisan.bangiaotaisans.edit'
    ]);
    $router->delete('bangiaotaisans/{bangiaotaisan}', [
        'as' => 'admin.bangiaotaisan.bangiaotaisan.destroy',
        'uses' => 'BangiaotaisanController@destroy',
        'middleware' => 'can:bangiaotaisan.bangiaotaisans.destroy'
    ]);
    $router->bind('thuhoitaisan', function ($id) {
        return app('Modules\Bangiaotaisan\Repositories\thuhoitaisanRepository')->find($id);
    });
    $router->get('thuhoitaisans', [
        'as' => 'admin.bangiaotaisan.thuhoitaisan.index',
        'uses' => 'thuhoitaisanController@index',
        'middleware' => 'can:bangiaotaisan.thuhoitaisans.index'
    ]);
    $router->get('thuhoitaisans/create', [
        'as' => 'admin.bangiaotaisan.thuhoitaisan.create',
        'uses' => 'thuhoitaisanController@create',
        'middleware' => 'can:bangiaotaisan.thuhoitaisans.create'
    ]);
    $router->post('thuhoitaisans', [
        'as' => 'admin.bangiaotaisan.thuhoitaisan.store',
        'uses' => 'thuhoitaisanController@store',
        'middleware' => 'can:bangiaotaisan.thuhoitaisans.create'
    ]);
    $router->get('thuhoitaisans/{thuhoitaisan}/edit', [
        'as' => 'admin.bangiaotaisan.thuhoitaisan.edit',
        'uses' => 'thuhoitaisanController@edit',
        'middleware' => 'can:bangiaotaisan.thuhoitaisans.edit'
    ]);
    $router->put('thuhoitaisans/{thuhoitaisan}', [
        'as' => 'admin.bangiaotaisan.thuhoitaisan.update',
        'uses' => 'thuhoitaisanController@update',
        'middleware' => 'can:bangiaotaisan.thuhoitaisans.edit'
    ]);
    $router->delete('thuhoitaisans/{thuhoitaisan}', [
        'as' => 'admin.bangiaotaisan.thuhoitaisan.destroy',
        'uses' => 'thuhoitaisanController@destroy',
        'middleware' => 'can:bangiaotaisan.thuhoitaisans.destroy'
    ]);
// append


});
