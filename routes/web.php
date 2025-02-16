<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//All profile routes start

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//All profile routes end



//All admin routes start

Route::get('/view_category', [AdminController::class,'view_category'])->name('view_category')->middleware(['auth', 'admin']);

Route::post('/add_category', [AdminController::class,'add_category'])->name('add_category')->middleware(['auth', 'admin']);

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category')->middleware(['auth', 'admin']);

Route::get('/edit_category/{id}', [AdminController::class, 'edit_category'])->name('edit_category')->middleware(['auth', 'admin']);

Route::post('/update_category/{id}', [AdminController::class, 'update_category'])->name('update_category')->middleware(['auth', 'admin']);

Route::get('/add_product', [AdminController::class, 'add_product'])->name('add_product')->middleware(['auth', 'admin']);

Route::post('/upload_product', [AdminController::class, 'upload_product'])->name('upload_product')->middleware(['auth', 'admin']);

Route::get('/view_product', [AdminController::class, 'view_product'])->name('view_product')->middleware(['auth', 'admin']);

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product')->middleware(['auth', 'admin']);

Route::get('/edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit_product')->middleware(['auth', 'admin']);

Route::post('/update_product/{slug}', [AdminController::class, 'update_product'])->name('update_product')->middleware(['auth', 'admin']);

Route::get('/product_search', [AdminController::class, 'product_search'])->name('product_search')->middleware(['auth', 'admin']);

Route::get('/view_products', [AdminController::class, 'view_products'])->name('view_products')->middleware(['auth', 'admin']);

Route::get('/on_the_way/{id}', [AdminController::class, 'on_the_way'])->name('on_the_way')->middleware(['auth', 'admin']);

Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered')->middleware(['auth', 'admin']);

Route::get('/change_pdf/{id}', [AdminController::class, 'change_pdf'])->name('change_pdf')->middleware(['auth', 'admin']);


//All admin routes end




//All home routes start

Route::get('/admin/dashboard', [HomeController::class,'index'])
->name('admin.dashboard')->middleware(['auth', 'admin']);

Route::get('/product_details/{id}', [HomeController::class,'product_details'])
->name('product_details');

Route::get('/myorders', [HomeController::class,'myorders'])->name('myorders')
->middleware(['auth', 'verified']);

Route::get('/', [HomeController::class,'home'])->name('home');

Route::get('/dashboard', [HomeController::class,'login_home'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add_cart/{id}', [HomeController::class,'add_cart'])
    ->middleware(['auth', 'verified'])->name('add_cart');

Route::get('/mycart', [HomeController::class,'mycart'])
    ->middleware(['auth', 'verified'])->name('mycart');

Route::get('/remove_cart/{id}', [HomeController::class,'remove_cart'])
    ->middleware(['auth', 'verified'])->name('remove_cart');

Route::post('/confirm_order', [HomeController::class,'confirm_order'])
    ->middleware(['auth', 'verified'])->name('confirm_order');

Route::get('/shop', [HomeController::class,'shop'])->name('home.shop')->middleware(['auth', 'verified']);
Route::get('/why', [HomeController::class,'why'])->name('home.why')->middleware(['auth', 'verified']);
Route::get('/testimonial', [HomeController::class,'testimonial'])->name('home.testimonial')->middleware(['auth', 'verified']);
Route::get('/contact', [HomeController::class,'contact'])->name('home.contact')->middleware(['auth', 'verified']);

//All home routes end
