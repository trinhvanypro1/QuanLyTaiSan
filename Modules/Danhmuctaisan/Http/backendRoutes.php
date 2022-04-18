<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/danhmuctaisan'], function (Router $router) {
    $router->bind('nhaptaisan', function ($id) {
        return app('Modules\Danhmuctaisan\Repositories\NhaptaisanRepository')->find($id);
    });
    $router->get('nhaptaisans', [
        'as' => 'admin.danhmuctaisan.nhaptaisan.index',
        'uses' => 'NhaptaisanController@index',
        'middleware' => 'can:danhmuctaisan.nhaptaisans.index'
    ]);
    $router->get('nhaptaisans/usage-history', [
        'as' => 'admin.danhmuctaisan.nhaptaisan.usage-history',
        'uses' => 'NhaptaisanController@usage_history'
    ]);
    $router->get('nhaptaisans/create', [
        'as' => 'admin.danhmuctaisan.nhaptaisan.create',
        'uses' => 'NhaptaisanController@create',
        'middleware' => 'can:danhmuctaisan.nhaptaisans.create'
    ]);
    $router->post('nhaptaisans', [
        'as' => 'admin.danhmuctaisan.nhaptaisan.store',
        'uses' => 'NhaptaisanController@store',
        'middleware' => 'can:danhmuctaisan.nhaptaisans.create'
    ]);
    $router->get('nhaptaisans/{nhaptaisan}/edit', [
        'as' => 'admin.danhmuctaisan.nhaptaisan.edit',
        'uses' => 'NhaptaisanController@edit',
        'middleware' => 'can:danhmuctaisan.nhaptaisans.edit'
    ]);
    $router->put('nhaptaisans/{nhaptaisan}', [
        'as' => 'admin.danhmuctaisan.nhaptaisan.update',
        'uses' => 'NhaptaisanController@update',
        'middleware' => 'can:danhmuctaisan.nhaptaisans.edit'
    ]);
    $router->delete('nhaptaisans/{nhaptaisan}', [
        'as' => 'admin.danhmuctaisan.nhaptaisan.destroy',
        'uses' => 'NhaptaisanController@destroy',
        'middleware' => 'can:danhmuctaisan.nhaptaisans.destroy'
    ]);
    $router->get('nhaptaisans/{nhaptaisan}/details', [
        'as' => 'admin.danhmuctaisan.nhaptaisan.details',
        'uses' => 'NhaptaisanController@details',
        'middleware' => 'can:danhmuctaisan.nhaptaisans.details'
    ]);

    $router->bind('suachua', function ($id) {
        return app('Modules\Danhmuctaisan\Repositories\SuachuaRepository')->find($id);
    });
    $router->get('suachuas', [
        'as' => 'admin.danhmuctaisan.suachua.index',
        'uses' => 'SuachuaController@index',
        'middleware' => 'can:danhmuctaisan.suachuas.index'
    ]);
    $router->get('suachuas/danhsachtaisanmat', [
        'as' => 'admin.danhmuctaisan.suachua.dsmat',
        'uses' => 'SuachuaController@dsmat'
    ]);
    $router->get('suachuas/danhsachsuachua', [
        'as' => 'admin.danhmuctaisan.suachua.dssuachua',
        'uses' => 'SuachuaController@dssuachua'
    ]);
    $router->get('suachuas/create', [
        'as' => 'admin.danhmuctaisan.suachua.create',
        'uses' => 'SuachuaController@create',
        'middleware' => 'can:danhmuctaisan.suachuas.create'
    ]);
    $router->get('suachuas/{thuhoitaisan}/taosuachua', [
        'as' => 'admin.danhmuctaisan.suachua.taosuachua',
        'uses' => 'SuachuaController@taosuachua'
    ]);
    $router->get('suachuas/{suachua}/capnhatsuachua', [
        'as' => 'admin.danhmuctaisan.suachua.capnhatsuachua',
        'uses' => 'SuachuaController@capnhatsuachua'
    ]);
    $router->post('suachuas', [
        'as' => 'admin.danhmuctaisan.suachua.store',
        'uses' => 'SuachuaController@store',
        'middleware' => 'can:danhmuctaisan.suachuas.create'
    ]);
    $router->post('suachuas', [
        'as' => 'admin.danhmuctaisan.suachua.cnsuachua',
        'uses' => 'SuachuaController@cnsuachua'
    ]);
    $router->get('suachuas/{suachua}/edit', [
        'as' => 'admin.danhmuctaisan.suachua.edit',
        'uses' => 'SuachuaController@edit',
        'middleware' => 'can:danhmuctaisan.suachuas.edit'
    ]);
    $router->put('suachuas/{suachua}', [
        'as' => 'admin.danhmuctaisan.suachua.update',
        'uses' => 'SuachuaController@update',
        'middleware' => 'can:danhmuctaisan.suachuas.edit'
    ]);
    $router->delete('suachuas/{suachua}', [
        'as' => 'admin.danhmuctaisan.suachua.destroy',
        'uses' => 'SuachuaController@destroy',
        'middleware' => 'can:danhmuctaisan.suachuas.destroy'
    ]);
    $router->bind('baoduong', function ($id) {
        return app('Modules\Danhmuctaisan\Repositories\BaoduongRepository')->find($id);
    });
    $router->get('baoduongs', [
        'as' => 'admin.danhmuctaisan.baoduong.index',
        'uses' => 'BaoduongController@index',
        'middleware' => 'can:danhmuctaisan.baoduongs.index'
    ]);
    $router->get('baoduongs/create', [
        'as' => 'admin.danhmuctaisan.baoduong.create',
        'uses' => 'BaoduongController@create',
        'middleware' => 'can:danhmuctaisan.baoduongs.create'
    ]);
    $router->post('baoduongs', [
        'as' => 'admin.danhmuctaisan.baoduong.store',
        'uses' => 'BaoduongController@store',
        'middleware' => 'can:danhmuctaisan.baoduongs.create'
    ]);
    $router->get('baoduongs/{baoduong}/edit', [
        'as' => 'admin.danhmuctaisan.baoduong.edit',
        'uses' => 'BaoduongController@edit',
        'middleware' => 'can:danhmuctaisan.baoduongs.edit'
    ]);
    $router->put('baoduongs/{baoduong}', [
        'as' => 'admin.danhmuctaisan.baoduong.update',
        'uses' => 'BaoduongController@update',
        'middleware' => 'can:danhmuctaisan.baoduongs.edit'
    ]);
    $router->delete('baoduongs/{baoduong}', [
        'as' => 'admin.danhmuctaisan.baoduong.destroy',
        'uses' => 'BaoduongController@destroy',
        'middleware' => 'can:danhmuctaisan.baoduongs.destroy'
    ]);

// append




});
