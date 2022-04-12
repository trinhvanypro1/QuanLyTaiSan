<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/baocao'], function (Router $router) {
    $router->bind('baocaoxuattaisan', function ($id) {
        return app('Modules\Baocao\Repositories\BaocaoxuattaisanRepository')->find($id);
    });
    $router->get('baocaoxuattaisans', [
        'as' => 'admin.baocao.baocaoxuattaisan.index',
        'uses' => 'BaocaoxuattaisanController@index',
        'middleware' => 'can:baocao.baocaoxuattaisans.index'
    ]);
    $router->get('baocaoxuattaisans/create', [
        'as' => 'admin.baocao.baocaoxuattaisan.create',
        'uses' => 'BaocaoxuattaisanController@create',
        'middleware' => 'can:baocao.baocaoxuattaisans.create'
    ]);
    $router->post('baocaoxuattaisans', [
        'as' => 'admin.baocao.baocaoxuattaisan.store',
        'uses' => 'BaocaoxuattaisanController@store',
        'middleware' => 'can:baocao.baocaoxuattaisans.create'
    ]);
    $router->get('baocaoxuattaisans/{baocaoxuattaisan}/edit', [
        'as' => 'admin.baocao.baocaoxuattaisan.edit',
        'uses' => 'BaocaoxuattaisanController@edit',
        'middleware' => 'can:baocao.baocaoxuattaisans.edit'
    ]);
    $router->put('baocaoxuattaisans/{baocaoxuattaisan}', [
        'as' => 'admin.baocao.baocaoxuattaisan.update',
        'uses' => 'BaocaoxuattaisanController@update',
        'middleware' => 'can:baocao.baocaoxuattaisans.edit'
    ]);
    $router->delete('baocaoxuattaisans/{baocaoxuattaisan}', [
        'as' => 'admin.baocao.baocaoxuattaisan.destroy',
        'uses' => 'BaocaoxuattaisanController@destroy',
        'middleware' => 'can:baocao.baocaoxuattaisans.destroy'
    ]);
    $router->bind('baocaonhaptaisan', function ($id) {
        return app('Modules\Baocao\Repositories\BaocaonhaptaisanRepository')->find($id);
    });
    $router->get('baocaonhaptaisans', [
        'as' => 'admin.baocao.baocaonhaptaisan.index',
        'uses' => 'BaocaonhaptaisanController@index',
        'middleware' => 'can:baocao.baocaonhaptaisans.index'
    ]);
    $router->get('baocaonhaptaisans/create', [
        'as' => 'admin.baocao.baocaonhaptaisan.create',
        'uses' => 'BaocaonhaptaisanController@create',
        'middleware' => 'can:baocao.baocaonhaptaisans.create'
    ]);
    $router->post('baocaonhaptaisans', [
        'as' => 'admin.baocao.baocaonhaptaisan.store',
        'uses' => 'BaocaonhaptaisanController@store',
        'middleware' => 'can:baocao.baocaonhaptaisans.create'
    ]);
    $router->get('baocaonhaptaisans/{baocaonhaptaisan}/edit', [
        'as' => 'admin.baocao.baocaonhaptaisan.edit',
        'uses' => 'BaocaonhaptaisanController@edit',
        'middleware' => 'can:baocao.baocaonhaptaisans.edit'
    ]);
    $router->put('baocaonhaptaisans/{baocaonhaptaisan}', [
        'as' => 'admin.baocao.baocaonhaptaisan.update',
        'uses' => 'BaocaonhaptaisanController@update',
        'middleware' => 'can:baocao.baocaonhaptaisans.edit'
    ]);
    $router->delete('baocaonhaptaisans/{baocaonhaptaisan}', [
        'as' => 'admin.baocao.baocaonhaptaisan.destroy',
        'uses' => 'BaocaonhaptaisanController@destroy',
        'middleware' => 'can:baocao.baocaonhaptaisans.destroy'
    ]);
    $router->bind('baocaokhac', function ($id) {
        return app('Modules\Baocao\Repositories\BaocaokhacRepository')->find($id);
    });
    $router->get('baocaokhacs', [
        'as' => 'admin.baocao.baocaokhac.index',
        'uses' => 'BaocaokhacController@index',
        'middleware' => 'can:baocao.baocaokhacs.index'
    ]);
    $router->get('baocaokhacs/create', [
        'as' => 'admin.baocao.baocaokhac.create',
        'uses' => 'BaocaokhacController@create',
        'middleware' => 'can:baocao.baocaokhacs.create'
    ]);
    $router->post('baocaokhacs', [
        'as' => 'admin.baocao.baocaokhac.store',
        'uses' => 'BaocaokhacController@store',
        'middleware' => 'can:baocao.baocaokhacs.create'
    ]);
    $router->get('baocaokhacs/{baocaokhac}/edit', [
        'as' => 'admin.baocao.baocaokhac.edit',
        'uses' => 'BaocaokhacController@edit',
        'middleware' => 'can:baocao.baocaokhacs.edit'
    ]);
    $router->put('baocaokhacs/{baocaokhac}', [
        'as' => 'admin.baocao.baocaokhac.update',
        'uses' => 'BaocaokhacController@update',
        'middleware' => 'can:baocao.baocaokhacs.edit'
    ]);
    $router->delete('baocaokhacs/{baocaokhac}', [
        'as' => 'admin.baocao.baocaokhac.destroy',
        'uses' => 'BaocaokhacController@destroy',
        'middleware' => 'can:baocao.baocaokhacs.destroy'
    ]);
// append



});
