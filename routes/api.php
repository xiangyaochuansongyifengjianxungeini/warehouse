<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//用户
Route::group([
    'prefix' => 'user'
], function ($router) {
    Route::post('login', 'UsersController@login');
    Route::post('logout', 'UsersController@logout');

});

Route::group(['middleware'=>'jwt.api.auth'],function(){
    Route::post('user/refresh', 'UsersController@refresh');
    Route::post('user/me', 'UsersController@me');

    //用户
    Route::resource('users','UsersController',['only'=>['index','store','update','destroy']]);
    Route::put('users/status/{user}','UsersController@updateStatus')->name('users.updateStatus');
    Route::get('users/permissions/{user}','UsersController@permission')->name('users.permission');
    Route::get('users/warehouse','UsersController@warehouse')->name('users.warehouse');
    Route::get('users/agent','UsersController@agent')->name('users.agent');
    Route::get('users/agentAnalysis','UsersController@agentAnalysis')->name('users.agentAnalysis');
    Route::put('users/resetPassword/{user}','UsersController@resetPassword')->name('users.resetPassword');
    Route::put('users/recoverPassword/{user}','UsersController@recoverPassword')->name('users.recoverPassword');


    //产品属性
    Route::resource('items','ItemsController',['only'=>['index']]);
    Route::post('items/values','ItemsController@valueStore')->name('items.valueStore');
    Route::delete('items/values/{ItemValue}','ItemsController@valueDestroy')->name('items.valueDestroy');


    //产品
    Route::resource('products','ProductsController',['only'=>['index','show','store']]);
    Route::get('products/output/all','ProductsController@output')->name('products.output');
    Route::get('products/stock/warning','ProductsController@stockWarning')->name('products.stock.warning');
    Route::put('products/status/{product}','ProductsController@statusUpdate')->name('products.status');
    Route::get('products/input/export','ProductsController@inputExport')->name('products.inputExport');
    Route::post('products/productSku','ProductsController@skuStore')->name('products.skuStore');
    Route::put('products/productSku/{productSku}','ProductsController@skuUpdate')->name('products.skuUpdate');
    Route::delete('products/productSku/{productSku}','ProductsController@skuDelete')->name('products.skuDelete');


    //角色
    Route::resource('roles','RolesController',['only'=>['index','store','update','destroy']]);
    Route::post('roles/permissions/{role}','RolesController@givePermission')->name('roles.givePermission');
    Route::put('roles/freeze/{role}','RolesController@freeze')->name('roles.freeze');
    Route::put('roles/unfreeze/{role}','RolesController@unfreeze')->name('roles.unfreeze');


    //权限
    Route::resource('permissions','PermissionsController',['only'=>['index','update']]);
    Route::put('permissions/freeze/{permission}','PermissionsController@freeze')->name('permissions.freeze');
    Route::put('permissions/unfreeze/{permission}','PermissionsController@unfreeze')->name('permissions.unfreeze');


    //订单
    Route::resource('orders','OrdersController',['only'=>['index','store','update','destroy']]);
    Route::put('orders/applyDelete/{order}','OrdersController@applyDelete')->name('orders.applyDelete');
    Route::put('orders/cancelDestroy/{order}','OrdersController@cancelDestroy')->name('orders.cancelDestroy');
    Route::put('orders/submit/{order}','OrdersController@submitConfirm')->name('orders.submitConfirm');
    Route::put('orders/notSubmit/{order}','OrdersController@notSubmitConfirm')->name('orders.notSubmitConfirm');
    Route::put('orders/output/{order}','OrdersController@outputUpdate')->name('orders.outuptUpdate');
    Route::get('orders/return','OrdersController@return')->name('orders.return');
    Route::put('orders/apply/{order}','OrdersController@apply')->name('orders.apply');
    Route::put('orders/cancel/{order}','OrdersController@cancel')->name('orders.cancel');
    Route::put('orders/applyConfirm/{order}','OrdersController@applyConfirm')->name('orders.applyConfirm');
    Route::get('orders/salesAnalysis','OrdersController@salesAnalysis')->name('orders.salesAnalysis');
    Route::get('orders/output/export','OrdersController@outputExport')->name('orders.outputExport');
    Route::get('orders/return/export','OrdersController@returnExport')->name('orders.returnExport');
    Route::get('orders/manage/print','OrdersController@managePrint')->name('orders.managePrint');


    //仓库
    Route::resource('warehouses','WarehousesController',['only'=>['index','store','update','destroy']]);
    
    //代理等级
    Route::resource('agentRanks','AgentRanksController',['only'=>['index','store','update','destroy']]);

    //供应商
    Route::resource('suppliers','SuppliersController',['only'=>['index','store','update','destroy']]);
    
    //系统配置
    Route::resource('systems','SystemsController',['only'=>['index','update']]);
    
    //日志
    Route::get('logs','SystemsController@log')->name('system.log');

});








