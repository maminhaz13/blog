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

Route::get('contact', 'FrontendController@contact')->name('contact');

Route::get('aboutus', 'FrontendController@aboutus')->name('aboutus');

Route::get('contact/list', 'FrontendController@contactlist')->name('contactlist')->middleware('auth')->middleware('auth');

Route::post('contact/post', 'FrontendController@contactpost')->name('contactpost');

Route::get('contact/list/download/{contact_id}', 'FrontendController@contactlistdownload')->name('contactlistdownload');

Route::post('user/testmonial', 'FrontendController@usertestmonial')->name('usertestmonial');

Route::get('testmonial/list', 'FrontendController@testmoniallist')->name('testmoniallist')->middleware('auth');

Route::get('testmonial/single/hide/{testimonial_id}', 'FrontendController@testmonial_hide')->name('testimonial.deactivate')->middleware('auth');

Route::get('testmonial/single/show/{testimonial_id}', 'FrontendController@testmonial_show')->name('testimonial.activate')->middleware('auth');

Route::post('newsletter/add', 'FrontendController@newsletter_add')->name('newsletter.add');

Route::get('send/newsletter', 'FrontendController@send_newsletter')->name('sendnewsletter')->middleware('auth');

Route::get('product/details/{slug}', 'FrontendController@productdetailsslug')->name('productdetailsslug');

Route::get('shop', 'FrontendController@shop')->name('shop');

Route::get('register/user', 'FrontendController@user_registration')->name('user.registration');

Route::post('register/user/post', 'FrontendController@user_registration_post')->name('user.registration.post');

Route::post('product/review', 'FrontendController@product_review')->name('product.review');

Route::post('subscriber/added', 'FrontendController@subscriber')->name('subscriber');

Route::get('search', 'FrontendController@search');

Route::get('customize/contact_info', 'FrontendController@custom_contact')->name('custom.contact.index')->middleware('auth');

Route::post('customize/contact_info/add', 'FrontendController@custom_contact_add')->name('custom.contact.add')->middleware('auth');

Route::get('customize/contact_info/edit/{id}', 'FrontendController@custom_contact_edit')->name('custom.contact.edit')->middleware('auth');

Route::post('customize/contact_info/update/{id}', 'FrontendController@custom_contact_update')->name('custom.contact.update')->middleware('auth');

Route::get('customize/contact_info/trash/{id}', 'FrontendController@custom_contact_trash')->name('custom.contact.trash')->middleware('auth');

Route::get('customize/contact_info/restore/{id}', 'FrontendController@custom_contact_restore')->name('custom.contact.restore')->middleware('auth');

Route::get('customize/contact_info/delete/{id}', 'FrontendController@custom_contact_delete')->name('custom.contact.delete')->middleware('auth');

Route::get('customize/contact_info/activate/{id}', 'FrontendController@custom_contact_activate')->name('custom.contact.activate')->middleware('auth');

Route::get('customize/contact_info/deactivate/{id}', 'FrontendController@custom_contact_deactivate')->name('custom.contact.deactivate')->middleware('auth');



//Banner Controller's Route
Route::resource('banner', 'BannerController')->middleware('auth');

Route::get('banner/status/activate/{id}', 'BannerController@activate')->name('banner.activate')->middleware('auth');

Route::get('banner/status/deactivate/{id}', 'BannerController@deactivate')->name('banner.deactivate')->middleware('auth');

Route::get('banner/restore/{id}', 'BannerController@restore')->name('banner.restore')->middleware('auth');

Route::get('banner/delete/{id}', 'BannerController@delete')->name('banner.delete')->middleware('auth');



//Home Controller's Route
Auth::routes(['verify' => true]);

Route::get('home', 'HomeController@index')->name('home')->middleware('verified');



//Category Controller's Route
Route::get('category/add', 'CategoryController@add_category')->name('addcategory')->middleware('auth');

Route::post('category/add/post', 'CategoryController@add_category_post')->name('addcategorypost')->middleware('auth');

Route::get('category/edit/{category_id}', 'CategoryController@edit_category')->name('editcategory')->middleware('auth');

Route::post('category/edit/post', 'CategoryController@edit_category_post')->name('editcategorypost')->middleware('auth');

Route::get('category/delete/{category_id}', 'CategoryController@delete_category')->name('deletecategory')->middleware('auth');

Route::post('category/markdelete', 'CategoryController@markdelete_category')->name('markdeletecategory')->middleware('auth');

Route::get('category/harddelete/{category_id}', 'CategoryController@harddelete_category')->name('harddeletecategory')->middleware('auth');

Route::get('category/restore/{category_id}', 'CategoryController@restore_category')->name('restorecategory')->middleware('auth');

Route::post('category/markrestore', 'CategoryController@markrestore_category')->name('markrestorecategory')->middleware('auth');



//Profile Controller's Route
Route::get('profile', 'ProfileController@profile')->name('profile')->middleware('auth');

Route::post('profile/edit/post', 'ProfileController@edit_profile')->name('editprofile')->middleware('auth');

Route::post('password/edit/post', 'ProfileController@edit_password')->name('editpassword')->middleware('auth');

Route::post('profilepicture/change', 'ProfileController@change_propicture')->name('changepropicture')->middleware('auth');

Route::get('profile/userlist', 'ProfileController@userlist')->name('userlist')->middleware('auth');



//Product Controller's Route
Route::resource('Product', 'ProductController');

Route::get('product/restore/{product_id}', 'ProductController@productrestore')->name('productrestore')->middleware('auth');

Route::get('product/foreverdelete/{product_id}', 'ProductController@productforeverdelete')->name('productforeverdelete')->middleware('auth');

Route::post('product/delete/mark', 'ProductController@product_mark_delete')->name('product.mark.delete')->middleware('auth');

Route::get('product/discount/index', 'ProductController@product_discount')->name('product.discount')->middleware('auth');

Route::post('product/discount/add', 'ProductController@product_discount_add')->name('product.discount.add')->middleware('auth');

Route::get('product/discount/edit/{product_id}', 'ProductController@product_discount_edit')->name('product.discount.edit')->middleware('auth');

Route::post('product/discount/edit/update', 'ProductController@product_discount_upd')->name('product.discount.upd')->middleware('auth');

Route::get('product/discount/remove/{id}', 'ProductController@product_discount_remove')->name('product.discount.remove')->middleware('auth');
Route::get('wysiwig', 'ProductController@wysiwig');



//Cart Controller's Route
Route::get('cart', 'CartController@cart')->name('cart');

Route::get('cart/{coupon_name}', 'CartController@cart')->name('cart.coupon');

Route::post('cart/store', 'CartController@cart_store')->name('cart.store');

Route::get('cart/delete/{cart_id}', 'CartController@cart_delete')->name('cart.delete');

Route::post('cart/update', 'CartController@cart_update')->name('cart.update');



//Coupon Controller's Route
Route::resource('Coupon', 'CouponController')->middleware('auth');



//Customer Controller's Route
Route::get('customer/home', 'CustomerController@customer_home')->name('customer.home')->middleware('auth');

Route::get('customer/orders', 'CustomerController@customer_order')->name('customer.order')->middleware('auth');

Route::get('customer/invoice/download/{order_id}', 'CustomerController@customer_invoice_download')->name('customer.invoice.download')->middleware('auth');



//Github Controller's Route
Route::get('login/github', 'GithubController@redirectToProvider');

Route::get('login/github/callback', 'GithubController@handleProviderCallback');



//Checkout Controller's Route
Route::get('shop/checkout', 'CheckoutController@checkout')->name('checkout')->middleware('auth');

Route::post('shop/checkout/post', 'CheckoutController@checkout_post')->name('checkout.post')->middleware('auth');

Route::post('get/city/list/ajax', 'CheckoutController@get_city_list_ajax')->middleware('auth');

Route::post('get/city/list/two/ajax', 'CheckoutController@get_city_list_two_ajax');

Route::get('testsms', 'CheckoutController@testsms');



//StripePaymentController Controller's Route
Route::get('stripe', 'StripePaymentController@stripe')->name('stripe');

Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');



//WishlistController Controller's Route
Route::get('wishlist', 'WishlistController@wishlist')->name('wishlist');

Route::get('wishlist/add/{product_id}', 'WishlistController@wishlist_add')->name('wishlist.add');

Route::get('wishlist/remove/{product_id}', 'WishListController@removeWishList')->name('removeWishList');



//Order Controller's Route
Route::resource('order', 'OrderController')->middleware('auth');

Route::get('order/cancel/{order_id}', 'OrderController@order_cancel')->name('order.cancel')->middleware('auth');



//About Controller's Route
Route::resource('about', 'AboutController')->middleware('auth');

Route::get('about/status/activate/{id}', 'AboutController@activate')->name('about.activate')->middleware('auth');

Route::get('about/status/deactivate/{id}', 'AboutController@deactivate')->name('about.deactivate')->middleware('auth');

Route::get('about/information/restore/{id}', 'AboutController@restore')->name('about.restore')->middleware('auth');

Route::get('about/delete/{id}', 'AboutController@delete')->name('about.delete')->middleware('auth');



//faq Controller's Route
Route::resource('products/faq', 'FAQController')->middleware('auth');

// Route::get('about/status/activate/{id}', 'AboutController@activate')->name('about.activate')->middleware('auth');

// Route::get('about/status/deactivate/{id}', 'AboutController@deactivate')->name('about.deactivate')->middleware('auth');

// Route::get('about/information/restore/{id}', 'AboutController@restore')->name('about.restore')->middleware('auth');

// Route::get('about/delete/{id}', 'AboutController@delete')->name('about.delete')->middleware('auth');