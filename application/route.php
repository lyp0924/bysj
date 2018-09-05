<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
Route::get('/','index/Index/index');
Route::get('/index','index/Index/index');
Route::get('/index/home','index/Index/home');

Route::get('/index/applyToJoin','index/Applys/applyToJoin');
Route::post('/index/submitApply','index/Applys/submitApply');
Route::post('/index/applyEdit','index/Applys/applyEdit');
Route::get('/index/userAudit','index/Applys/userAudit');

Route::get('/index/getCaptcha/:time','index/Users/getCaptcha');
Route::get('/index/login','index/Users/login');
Route::get('/index/index/login','index/Users/login');
Route::get('/index/logout','index/Users/logout');
Route::post('/index/userLogin','index/Users/userLogin');

Route::get('/index/userList/:role_id','index/users/userList');
//Route::get('/index/userList/test','index/users/userList');

Route::post('/index/ajaxGetUserList','index/users/ajaxGetUserList');
Route::post('/index/delUser','index/users/delUser');
Route::get('/index/userEdit/:userId','index/users/editUser');
Route::get('/index/userInfo','index/users/userInfo');
Route::post('/index/saveEditUser','index/users/saveEditUser');
Route::post('/index/savePwd','index/users/savePwd');
Route::post('/index/delUserBatch','index/users/delbatch');

Route::post('/index/delArticleListBatch','index/Article/delListbatch');
Route::post('/index/delArticleSortBatch','index/Article/delSortbatch');

Route::get('/index/roleManager','index/Roles/roleManager');
Route::get('/index/roleAdd/[:role_id]','index/Roles/roleAdd');
Route::post('/index/submitRole','index/Roles/submitRole');
Route::post('/index/delRole','index/Roles/delRole');

Route::get('/index/adminCompetence','index/Permissions/adminCompetence');
Route::post('/index/permissionAdd','index/Permissions/permissionAdd');
Route::post('/index/delPermission','index/Permissions/delPermission');


Route::get('/index/articleSort','index/Article/articleSort');
Route::get('/index/articleAdd','index/Article/articleAdd');
Route::get('/index/articleList','index/Article/articleList');






