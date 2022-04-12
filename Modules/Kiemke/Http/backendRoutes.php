<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/kiemke'], function (Router $router) {
    $router->bind('nhapkiemke', function ($id) {
        return app('Modules\Kiemke\Repositories\NhapkiemkeRepository')->find($id);
    });
    $router->get('nhapkiemkes', [
        'as' => 'admin.kiemke.nhapkiemke.index',
        'uses' => 'NhapkiemkeController@index',
        'middleware' => 'can:kiemke.nhapkiemkes.index'
    ]);
    $router->get('nhapkiemkes/create', [
        'as' => 'admin.kiemke.nhapkiemke.create',
        'uses' => 'NhapkiemkeController@create',
        'middleware' => 'can:kiemke.nhapkiemkes.create'
    ]);
    $router->post('nhapkiemkes', [
        'as' => 'admin.kiemke.nhapkiemke.store',
        'uses' => 'NhapkiemkeController@store',
        'middleware' => 'can:kiemke.nhapkiemkes.create'
    ]);
    $router->get('nhapkiemkes/{nhapkiemke}/edit', [
        'as' => 'admin.kiemke.nhapkiemke.edit',
        'uses' => 'NhapkiemkeController@edit',
        'middleware' => 'can:kiemke.nhapkiemkes.edit'
    ]);
    $router->put('nhapkiemkes/{nhapkiemke}', [
        'as' => 'admin.kiemke.nhapkiemke.update',
        'uses' => 'NhapkiemkeController@update',
        'middleware' => 'can:kiemke.nhapkiemkes.edit'
    ]);
    $router->delete('nhapkiemkes/{nhapkiemke}', [
        'as' => 'admin.kiemke.nhapkiemke.destroy',
        'uses' => 'NhapkiemkeController@destroy',
        'middleware' => 'can:kiemke.nhapkiemkes.destroy'
    ]);
    $router->bind('danhmuckiemke', function ($id) {
        return app('Modules\Kiemke\Repositories\DanhmuckiemkeRepository')->find($id);
    });
    $router->get('danhmuckiemkes', [
        'as' => 'admin.kiemke.danhmuckiemke.index',
        'uses' => 'DanhmuckiemkeController@index',
        'middleware' => 'can:kiemke.danhmuckiemkes.index'
    ]);
    $router->get('danhmuckiemkes/create', [
        'as' => 'admin.kiemke.danhmuckiemke.create',
        'uses' => 'DanhmuckiemkeController@create',
        'middleware' => 'can:kiemke.danhmuckiemkes.create'
    ]);
    $router->post('danhmuckiemkes', [
        'as' => 'admin.kiemke.danhmuckiemke.store',
        'uses' => 'DanhmuckiemkeController@store',
        'middleware' => 'can:kiemke.danhmuckiemkes.create'
    ]);
    $router->get('danhmuckiemkes/{danhmuckiemke}/edit', [
        'as' => 'admin.kiemke.danhmuckiemke.edit',
        'uses' => 'DanhmuckiemkeController@edit',
        'middleware' => 'can:kiemke.danhmuckiemkes.edit'
    ]);
    $router->put('danhmuckiemkes/{danhmuckiemke}', [
        'as' => 'admin.kiemke.danhmuckiemke.update',
        'uses' => 'DanhmuckiemkeController@update',
        'middleware' => 'can:kiemke.danhmuckiemkes.edit'
    ]);
    $router->delete('danhmuckiemkes/{danhmuckiemke}', [
        'as' => 'admin.kiemke.danhmuckiemke.destroy',
        'uses' => 'DanhmuckiemkeController@destroy',
        'middleware' => 'can:kiemke.danhmuckiemkes.destroy'
    ]);
// append


});
