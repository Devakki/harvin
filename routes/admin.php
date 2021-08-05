<?php

use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogCategoriesController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GetNotifiedController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\CertifyPostController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PledgeController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\CredibilityBrandController;
use App\Http\Controllers\Admin\StaticsController;
use App\Http\Controllers\Admin\HashtagsController;
use App\Http\Controllers\Admin\BadgeController;

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

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::middleware(['adminAuth'])->group(function () {

	Route::get('/', [DashboardController::class, 'index']);

	Route::get('/admin-users/datatable', [AdminUsersController::class, 'getDatatable']);	
	Route::resource('/admin-users', AdminUsersController::class);

	Route::get('/blog-categories/datatable', [BlogCategoriesController::class, 'getDatatable']);	
	Route::resource('/blog-categories', BlogCategoriesController::class);

	Route::get('/hashtags/datatable', [HashtagsController::class, 'getDatatable']);	
	Route::resource('/hashtags', HashtagsController::class);

	Route::get('/blog/datatable', [BlogController::class, 'getDatatable']);	
	Route::resource('/blog', BlogController::class);

	Route::get('/team/datatable', [TeamController::class, 'getDatatable']);	
	Route::resource('/team', TeamController::class);

	Route::get('/organization/datatable', [OrganizationController::class, 'getDatatable']);	
	Route::resource('/organization', OrganizationController::class);

	Route::get('/certifypost/datatable', [CertifyPostController::class, 'getDatatable']);	
	Route::resource('/certifypost', CertifyPostController::class);

	Route::get('/get-notified/datatable', [GetNotifiedController::class, 'getDatatable']);	
	Route::resource('/get-notified', GetNotifiedController::class);
	Route::post('/change-email-notification-settings', [GetNotifiedController::class, 'changeEmailNotificationSettings']);	

	Route::get('/testimonial/datatable', [TestimonialController::class, 'getDatatable']);	
	Route::resource('/testimonial', TestimonialController::class);
	
	Route::get('/badge/datatable', [BadgeController::class, 'getDatatable']);	
	Route::resource('/badge', BadgeController::class);
	
	Route::get('/faq/datatable', [FaqController::class, 'getDatatable']);	
	Route::resource('/faq', FaqController::class);
	

	Route::get('/company/datatable', [CompanyController::class, 'getDatatable']);	
	Route::resource('/company', CompanyController::class);
	
	Route::get('/pledge/datatable', [PledgeController::class, 'getDatatable']);	
	Route::resource('/pledge', PledgeController::class);
	
	Route::get('/city/datatable', [CityController::class, 'getDatatable']);	
	Route::resource('/city', CityController::class);
	
	Route::get('/state/datatable', [StateController::class, 'getDatatable']);	
	Route::resource('/state', StateController::class);
	
	Route::get('/industry/datatable', [IndustryController::class, 'getDatatable']);	
	Route::resource('/industry', IndustryController::class);
	
	Route::get('/statics/datatable', [StaticsController::class, 'getDatatable']);	
	Route::resource('/statics', StaticsController::class);
	
	Route::get('/credibilitybrands/datatable', [CredibilityBrandController::class, 'getDatatable']);	
	Route::resource('/credibilitybrands', CredibilityBrandController::class);
	

});