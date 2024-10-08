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

/*
2017-10-30 setup for urls
Home:			/
Brand:			/52/AEG/
Type:			/52/AEG/53/Superdeluxe/
Manual:			/52/AEG/53/Superdeluxe/8023/manual/
				/52/AEG/456/Testhandle/8023/manual/

If we want to add product categories later:
Productcat:		/category/12/Computers/
*/

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\LocaleController;


// Homepage
Route::get('/', function () {
    $brands = Brand::all()->sortBy('name');
    return view('pages.homepage', compact('brands'));
})->name('home');

Route::get('/manual/{language}/{brand_slug}/', [RedirectController::class, 'brand']);
Route::get('/manual/{language}/{brand_slug}/brand.html', [RedirectController::class, 'brand']);

Route::get('/datafeeds/{brand_slug}.xml', [RedirectController::class, 'datafeed']);

// Locale routes
Route::get('/language/{language_slug}/', [LocaleController::class, 'changeLocale']);

// List of manuals for a brand
Route::get('/{brand_id}/{brand_slug}/', [BrandController::class, 'show']);

// Detail page for a manual
Route::get('/{brand_id}/{brand_slug}/{manual_id}/', [ManualController::class, 'show']);


// Edit routes bovenaan
Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brands.update');

// Dynamische routes onderaan
Route::get('/{brand_id}/{brand_slug}/', [BrandController::class, 'show']);
Route::get('/{brand_id}/{brand_slug}/{manual_id}/', [ManualController::class, 'show']);

Route::prefix('brands')->group(function () {
    Route::get('{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('{id}', [BrandController::class, 'update'])->name('brands.update');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::post('/contact', function (Request $request) {

    $data = $request->only(['name', 'email', 'message']);
    $content = "Naam: {$data['name']}\nE-mail: {$data['email']}\nBericht: {$data['message']}\n";
    $filename = 'contact_' . time() . '.txt';
    File::put(storage_path('app/' . $filename), $content);

    return back()->with('success', 'Bedankt voor je bericht!');
});