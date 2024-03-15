<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use App\Http\Controllers\Frontend\WishlistController;

// use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// FrontEnd
Route::controller(FrontendController::class)->group(function () {
    Route::get("/",'index');
    Route::get('/collections','categories');
    Route::get('/collections/{category_slug}','products');
    Route::get('/collections/{category_slug}/{product_slug}','productView');
    Route::get("/new_arrivals",'newArrivals');
    Route::get("/featured",'featured');
    Route::get('/search','searchProducts');
    Route::get('/contact-us','contactUs');
    Route::get('/about-us','aboutUs');
    Route::post('/contactUs','userContact');
});

// WishList
Route::middleware(['auth'])->group(function () {
    Route::controller(WishlistController::class)->group(function () {
        Route::get('/wishlist','index');
    });
});


// Cart
Route::middleware(['auth'])->group(function () {
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart','index');
    });
});

// User Profile
Route::middleware(['auth'])->group(function () {
    Route::controller(FrontendUserController::class)->group(function () {
        Route::get('/profile','index');
        Route::post('/profile','updateUserDetails');
        Route::get('change-password','passChange');
        Route::post('change-password','updatePass');
    });
});

// CheckOut
Route::middleware(['auth'])->group(function () {
    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout','index');
    });
});

// Order
Route::middleware(['auth'])->group(function () {
    Route::controller(OrderController::class)->group(function () {
        Route::get('/orders','index');
        Route::get('/orders/{order_id}','show');
    });
});


// Thank You Page
Route::get('thank-you',[FrontendController::class,'thankyou']);

// Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// All under Admin prefix
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index');
        Route::get('category/create', 'create');
        Route::post('category', 'store');
        Route::get('category/{c}/edit', 'edit');
        Route::put('category/{c}/update', 'update');
    });

    // Products
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products','store');
        Route::get('products/{product}/edit', 'edit');
        Route::put('products/{product}', 'update');
        Route::get('/product-image/{image}/delete','destroyImage');
        Route::get('products/{product}/delete','destroy');

        Route::post('product-color/{prod_color_id}','updateProdColorQty');
        Route::get('product-color/{prod_color_id}/delete','deleteProdColorQty');
    });

    // Brands
    Route::get('/brands', App\Livewire\Admin\Brand\Index::class);

    // Colors
    Route::controller(ColorController::class)->group(function () {
        Route::get('/colors','index');
        Route::get('/colors/create','create');
        Route::post('/colors/create','store');
        Route::get('colors/{color}/edit', 'edit');
        Route::put('colors/{color}', 'update');
        Route::get('colors/{color}/delete','destroy');

    });

    // Sliders
    Route::controller(SliderController::class)->group(function () {
        Route::get('/sliders','index');
        Route::get('/sliders/create','create');
        Route::post('/sliders/create','store');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::put('sliders/{slider}', 'update');
        Route::get('sliders/{slider}/delete','destroy');
    });

    // Orders
    Route::controller(OrdersController::class)->group(function () {
        Route::get('/orders','index');
        Route::get('/orders/{order_id}','show');
        Route::put('/orders/{order_id}','updateOrderStatus');

        Route::get('/invoice/{oredrId}','viewInvoice');
        Route::get('/invoice/{oredrId}/generate','generateInvoice');
        Route::get('/invoice/{oredrId}/mail','mailInvoice');
    });

    Route::controller(SettingController::class)->group(function () {
        Route::get('/settings','index');
        Route::post('/settings','store');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users','index');
        Route::get('/users/create','create');
        Route::post('/users','store');
        Route::get('/users/{user_id}/edit','edit');
        Route::put('/users/{user_id}', 'update');
        Route::get('/users/{user_id}/delete','destroy');
    });
});


