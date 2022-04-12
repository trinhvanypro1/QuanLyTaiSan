<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/danhmuc'], function (Router $router) {
    $router->bind('danhmucphongban', function ($id) {
        return app('Modules\Danhmuc\Repositories\DanhmucphongbanRepository')->find($id);
    });
    $router->get('danhmucphongbans', [
        'as' => 'admin.danhmuc.danhmucphongban.index',
        'uses' => 'DanhmucphongbanController@index',
        'middleware' => 'can:danhmuc.danhmucphongbans.index'
    ]);
    $router->get('danhmucphongbans/create', [
        'as' => 'admin.danhmuc.danhmucphongban.create',
        'uses' => 'DanhmucphongbanController@create',
        'middleware' => 'can:danhmuc.danhmucphongbans.create'
    ]);
    $router->post('danhmucphongbans', [
        'as' => 'admin.danhmuc.danhmucphongban.store',
        'uses' => 'DanhmucphongbanController@store',
        'middleware' => 'can:danhmuc.danhmucphongbans.create'
    ]);
    $router->get('danhmucphongbans/{danhmucphongban}/edit', [
        'as' => 'admin.danhmuc.danhmucphongban.edit',
        'uses' => 'DanhmucphongbanController@edit',
        'middleware' => 'can:danhmuc.danhmucphongbans.edit'
    ]);
    $router->put('danhmucphongbans/{danhmucphongban}', [
        'as' => 'admin.danhmuc.danhmucphongban.update',
        'uses' => 'DanhmucphongbanController@update',
        'middleware' => 'can:danhmuc.danhmucphongbans.edit'
    ]);
    $router->delete('danhmucphongbans/{danhmucphongban}', [
        'as' => 'admin.danhmuc.danhmucphongban.destroy',
        'uses' => 'DanhmucphongbanController@destroy',
        'middleware' => 'can:danhmuc.danhmucphongbans.destroy'
    ]);
    $router->bind('danhmucnhanvien', function ($id) {
        return app('Modules\Danhmuc\Repositories\DanhmucnhanvienRepository')->find($id);
    });
    $router->get('danhmucnhanviens', [
        'as' => 'admin.danhmuc.danhmucnhanvien.index',
        'uses' => 'DanhmucnhanvienController@index',
        'middleware' => 'can:danhmuc.danhmucnhanviens.index'
    ]);
    $router->get('danhmucnhanviens/create', [
        'as' => 'admin.danhmuc.danhmucnhanvien.create',
        'uses' => 'DanhmucnhanvienController@create',
        'middleware' => 'can:danhmuc.danhmucnhanviens.create'
    ]);
    $router->post('danhmucnhanviens', [
        'as' => 'admin.danhmuc.danhmucnhanvien.store',
        'uses' => 'DanhmucnhanvienController@store',
        'middleware' => 'can:danhmuc.danhmucnhanviens.create'
    ]);
    $router->post('danhmucnhanviens/selectDiachi',[
        'as' => 'admin.danhmuc.danhmucnhanvien.selectDiachi',
        'uses' => 'DanhmucnhanvienController@selectDiachi',
        'middleware' => 'can:danhmuc.danhmucnhanviens.create'
    ]);

    $router->get('danhmucnhanviens/{danhmucnhanvien}/edit', [
        'as' => 'admin.danhmuc.danhmucnhanvien.edit',
        'uses' => 'DanhmucnhanvienController@edit',
        'middleware' => 'can:danhmuc.danhmucnhanviens.edit'
    ]);
    $router->put('danhmucnhanviens/{danhmucnhanvien}', [
        'as' => 'admin.danhmuc.danhmucnhanvien.update',
        'uses' => 'DanhmucnhanvienController@update',
        'middleware' => 'can:danhmuc.danhmucnhanviens.edit'
    ]);
    $router->delete('danhmucnhanviens/{danhmucnhanvien}', [
        'as' => 'admin.danhmuc.danhmucnhanvien.destroy',
        'uses' => 'DanhmucnhanvienController@destroy',
        'middleware' => 'can:danhmuc.danhmucnhanviens.destroy'
    ]);
    $router->bind('danhmucnhacungcap', function ($id) {
        return app('Modules\Danhmuc\Repositories\DanhmucnhacungcapRepository')->find($id);
    });
    $router->get('danhmucnhacungcaps', [
        'as' => 'admin.danhmuc.danhmucnhacungcap.index',
        'uses' => 'DanhmucnhacungcapController@index',
        'middleware' => 'can:danhmuc.danhmucnhacungcaps.index'
    ]);
    $router->get('danhmucnhacungcaps/create', [
        'as' => 'admin.danhmuc.danhmucnhacungcap.create',
        'uses' => 'DanhmucnhacungcapController@create',
        'middleware' => 'can:danhmuc.danhmucnhacungcaps.create'
    ]);
    $router->post('danhmucnhacungcaps', [
        'as' => 'admin.danhmuc.danhmucnhacungcap.store',
        'uses' => 'DanhmucnhacungcapController@store',
        'middleware' => 'can:danhmuc.danhmucnhacungcaps.create'
    ]);
    $router->get('danhmucnhacungcaps/{danhmucnhacungcap}/edit', [
        'as' => 'admin.danhmuc.danhmucnhacungcap.edit',
        'uses' => 'DanhmucnhacungcapController@edit',
        'middleware' => 'can:danhmuc.danhmucnhacungcaps.edit'
    ]);
    $router->put('danhmucnhacungcaps/{danhmucnhacungcap}', [
        'as' => 'admin.danhmuc.danhmucnhacungcap.update',
        'uses' => 'DanhmucnhacungcapController@update',
        'middleware' => 'can:danhmuc.danhmucnhacungcaps.edit'
    ]);
    $router->delete('danhmucnhacungcaps/{danhmucnhacungcap}', [
        'as' => 'admin.danhmuc.danhmucnhacungcap.destroy',
        'uses' => 'DanhmucnhacungcapController@destroy',
        'middleware' => 'can:danhmuc.danhmucnhacungcaps.destroy'
    ]);
    $router->bind('danhmucloaitaisan', function ($id) {
        return app('Modules\Danhmuc\Repositories\DanhmucloaitaisanRepository')->find($id);
    });
    $router->get('danhmucloaitaisans', [
        'as' => 'admin.danhmuc.danhmucloaitaisan.index',
        'uses' => 'DanhmucloaitaisanController@index',
        'middleware' => 'can:danhmuc.danhmucloaitaisans.index'
    ]);
    $router->get('danhmucloaitaisans/create', [
        'as' => 'admin.danhmuc.danhmucloaitaisan.create',
        'uses' => 'DanhmucloaitaisanController@create',
        'middleware' => 'can:danhmuc.danhmucloaitaisans.create'
    ]);
    $router->post('danhmucloaitaisans', [
        'as' => 'admin.danhmuc.danhmucloaitaisan.store',
        'uses' => 'DanhmucloaitaisanController@store',
        'middleware' => 'can:danhmuc.danhmucloaitaisans.create'
    ]);
    $router->get('danhmucloaitaisans/{danhmucloaitaisan}/edit', [
        'as' => 'admin.danhmuc.danhmucloaitaisan.edit',
        'uses' => 'DanhmucloaitaisanController@edit',
        'middleware' => 'can:danhmuc.danhmucloaitaisans.edit'
    ]);
    $router->put('danhmucloaitaisans/{danhmucloaitaisan}', [
        'as' => 'admin.danhmuc.danhmucloaitaisan.update',
        'uses' => 'DanhmucloaitaisanController@update',
        'middleware' => 'can:danhmuc.danhmucloaitaisans.edit'
    ]);
    $router->delete('danhmucloaitaisans/{danhmucloaitaisan}', [
        'as' => 'admin.danhmuc.danhmucloaitaisan.destroy',
        'uses' => 'DanhmucloaitaisanController@destroy',
        'middleware' => 'can:danhmuc.danhmucloaitaisans.destroy'
    ]);
// append




});
