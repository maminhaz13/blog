<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//Frontend Controller's Route
Route::get('/', 'FrontendController@index')->name('index');

Route::get('about', 'FrontendController@about')->name('about');

Route::get('contact', 'FrontendController@contact')->name('contact');

Route::get('contact/list', 'FrontendController@contactlist')->name('contactlist');

Route::post('contact/post', 'FrontendController@contactpost')->name('contactpost');

Route::get('send/newsletter', 'FrontendController@send_newsletter')->name('sendnewsletter');

Route::post('user/testmonial', 'FrontendController@usertestmonial')->name('usertestmonial');

Route::get('product/details/{slug}', 'FrontendController@productdetailsslug')->name('productdetailsslug');

Route::get('shop', 'FrontendController@shop')->name('shop');

Route::get('register/user', 'FrontendController@user_registration')->name('user.registration');

Route::post('register/user/post', 'FrontendController@user_registration_post')->name('user.registration.post');



//Home Controller's Route
Auth::routes(['verify' => true]);

Route::get('home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('frontend', 'FrontendController@frontend')->name('frontend');

Route::post('frontend/main_banner/post', 'FrontendController@frontend_mainbanner_post')->name('frontend.mainbanner.post');

Route::post('frontend/discount_banner/post', 'FrontendController@frontend_discountbanner_post')->name('frontend.discountbanner.post');

Route::get('contact/list/download/{contact_id}', 'FrontendController@contactlistdownload')->name('contactlistdownload');



//Category Controller's Route
Route::get('category/add', 'CategoryController@add_category')->name('addcategory');

Route::post('category/add/post', 'CategoryController@add_category_post')->name('addcategorypost');

Route::get('category/edit/{category_id}', 'CategoryController@edit_category')->name('editcategory');

Route::post('category/edit/post', 'CategoryController@edit_category_post')->name('editcategorypost');

Route::get('category/delete/{category_id}', 'CategoryController@delete_category')->name('deletecategory');

Route::post('category/markdelete', 'CategoryController@markdelete_category')->name('markdeletecategory');

Route::get('category/harddelete/{category_id}', 'CategoryController@harddelete_category')->name('harddeletecategory');

Route::get('category/restore/{category_id}', 'CategoryController@restore_category')->name('restorecategory');

Route::post('category/markrestore', 'CategoryController@markrestore_category')->name('markrestorecategory');



//Profile Controller's Route
Route::get('profile', 'ProfileController@profile')->name('profile');

Route::post('profile/edit/post', 'ProfileController@edit_profile')->name('editprofile');

Route::post('password/edit/post', 'ProfileController@edit_password')->name('editpassword');

Route::post('profilepicture/change', 'ProfileController@change_propicture')->name('changepropicture');

Route::get('profile/userlist', 'ProfileController@userlist')->name('userlist');



//Product Controller's Route
Route::resource('Product', 'ProductController');

Route::get('product/restore/{product_id}', 'ProductController@productrestore')->name('productrestore');

Route::get('product/foreverdelete/{product_id}', 'ProductController@productforeverdelete')->name('productforeverdelete');



//Cart Controller's Route
Route::get('cart', 'CartController@cart')->name('cart');

Route::get('cart/{coupon_name}', 'CartController@cart')->name('cart.coupon');

Route::post('cart/store', 'CartController@cart_store')->name('cart.store');

Route::get('cart/delete/{cart_id}', 'CartController@cart_delete')->name('cart.delete');

Route::post('cart/update', 'CartController@cart_update')->name('cart.update');



//Blog Controller's Route
Route::get('blog', 'BlogController@blog')->name('blog');

Route::get('blog/write/{user_id}', 'BlogController@writeblog')->name('blog.write');

Route::post('blog/written/{user_id}', 'BlogController@blogwritten')->name('blogwritten');

Route::get('blog/details', 'BlogController@detailsblog')->name('blog.details');



//Coupon Controller's Route
Route::resource('Coupon', 'CouponController');



//Customer Controller's Route
Route::get('customer/home', 'CustomerController@customer_home')->name('customer.home');



//Github Controller's Route
Route::get('login/github', 'GithubController@redirectToProvider');

Route::get('login/github/callback', 'GithubController@handleProviderCallback');



//Checkout Controller's Route
Route::get('shop/checkout', 'CheckoutController@checkout')->name('checkout');

Route::post('shop/checkout/post', 'CheckoutController@checkout_post');