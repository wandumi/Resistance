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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sort', function () {
    return view('sort');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/bbbees_sort', 'BbbeeController@updateAll');
Route::get('/bbbees_sortable', 'BbbeeController@sortable')->name('bbbees_sortable');
Route::resource('bbbees', BbbeeController::class);

Route::resource('shareholders', ShareholderController::class);

Route::resource('pronvices', PronviceController::class);

Route::resource('properties', PropertyController::class);


Route::prefix('portifolios')->group(function() {

    Route::resource('portifolio', PortifolioController::class); 
    
    Route::resource('portifolio_lists', PortifolioListController::class);

});

Route::prefix('financials')->group(function(){
    Route::resource('financial', FinancialController::class);
    
    Route::resource('financial_section', FinancialSectionController::class);
});

Route::prefix('presentations')->group(function(){
    Route::resource('presentation', PresentationController::class);
    
    Route::resource('presentation_sections', PresentationSectionController::class);
});

Route::prefix('dmtns')->group(function(){
    Route::post('/dmtn_sort', 'DmtnController@updateAll');
    Route::get('/dmtn_sortable', 'DmtnController@sortable')->name('dmtn_sortable');
    Route::resource('dmtn', DmtnController::class);
    
    Route::post('/dmtn_sections_sort', 'DmtnSectionController@updateAll');
    Route::get('/dmtn_sections_sortable', 'DmtnSectionController@sortable')->name('dmtn_sections_sortable');
    Route::resource('dmtn_sections', DmtnSectionController::class);

    Route::post('/program_documents_sort', 'DmtnProgDocumentsController@updateAll');
    Route::get('/program_documents_sortable', 'DmtnProgDocumentsController@sortable')->name('program_documents_sortable');
    Route::resource('program_documents', DmtnProgDocumentsController::class);

    Route::post('/policies_sort', 'DmtnPoliciesController@updateAll');
    Route::get('/policies_sortable', 'DmtnPoliciesController@sortable')->name('policies_sortable');
    Route::resource('policies', DmtnPoliciesController::class);

    Route::post('/price_supplements_sort', 'DmtnPriceSupplementsController@updateAll');
    Route::get('/price_supplements_sortable', 'DmtnPriceSupplementsController@sortable')->name('price_supplements_sortable');
    Route::resource('price_supplements', DmtnPriceSupplementsController::class);

    Route::post('/credit_ratings_sort', 'DmtnCreditRatingController@updateAll');
    Route::get('/credit_ratings_sortable', 'DmtnCreditRatingController@sortable')->name('credit_ratings_sortable');
    Route::resource('credit_ratings', DmtnCreditRatingController::class);
});
