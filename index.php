<?php
include "core/Routes.php";
use Router\Route;

Route::route('/newSite/','\Controller\Web::catalog');
if(isset($_COOKIE['user']))Route::route('/newSite/cart','\Controller\Web::cart');
Route::route('/newSite/product/(\d+)','\Controller\Web::catalogsProduct');
Route::route('/newSite/to_cart/(\d+)/(\w+)','\Controller\Web::cartControl');
Route::route('/newSite/about','\Controller\Web::about');
Route::route('/newSite/album','\Controller\Web::album');
Route::route('/newSite/admin','\Controller\Web::admin');
Route::route('/newSite/login','\Controller\Web::LoginUser');
Route::route('/newSite/register','\Controller\Web::RegisterUser');
Route::route('/newSite/logout','\Controller\Web::logout');

Route::execute($_SERVER['REQUEST_URI']);