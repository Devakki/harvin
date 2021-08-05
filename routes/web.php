<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CertifyController;
use App\Http\Controllers\GreenplaceWorkController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\CoolCliemetController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PledgeController;

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
Route::get('/', [LandingController::class, 'index']);
Route::post('/get-notified', [LandingController::class, 'submitGetNotified']);
Route::get('/get-location', [LandingController::class, 'getLocation']);
Route::get('/get-state', [LandingController::class, 'getState']);
Route::get('/get-city', [LandingController::class, 'getCity']);

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{blog_slug}', [BlogController::class, 'blogDetail']);
Route::get('/blog/tag/{tag_slug}', [BlogController::class, 'tagBlogListing']);
Route::get('/why-certify', [CertifyController::class, 'index']);
Route::get('/greenplaces-work', [GreenplaceWorkController::class, 'index']);
Route::get('/about-us', [AboutusController::class, 'index']);
Route::get('/greenplaces-work/datatable', [GreenplaceWorkController::class, 'getDatatable']);	
Route::get('/greenplaces-work/{company_slug}', [GreenplaceWorkController::class, 'companydetail']);
Route::get('/badgecode/{company_slug}', [GreenplaceWorkController::class, 'badgeDetail']);

Route::get('/pledge/{pledge_slug}', [PledgeController::class, 'pledgeDetail']);
Route::get('/get_carbon_slug', [LandingController::class, 'getblogslug']);

Route::get('/terms', function () {
    return view('main/terms');
});
Route::get('/policy', function () {
    return view('main/policy');
});

Route::post('/calculate', [CoolCliemetController::class, 'index']);
Route::post('/sendmail', [CoolCliemetController::class, 'sendmail']);
Route::get('/distance', [CoolCliemetController::class, 'getdistancefrom']);


Route::get('/animation-demo', function () {
    return view('main/animation-demo');
});