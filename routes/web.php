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

Route::get('/edit_product/{slug}', [AdminController::class, 'edit_product'])->name('edit_product')->middleware(['auth', 'admin']);

Route::post('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product')->middleware(['auth', 'admin']);

Route::get('/product_search', [AdminController::class, 'product_search'])->name('product_search')->middleware(['auth', 'admin']);

Route::get('/view_products', [AdminController::class, 'view_products'])->name('view_products')->middleware(['auth', 'admin']);

Route::get('/on_the_way/{id}', [AdminController::class, 'on_the_way'])->name('on_the_way')->middleware(['auth', 'admin']);

Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered')->middleware(['auth', 'admin']);

Route::get('/change_pdf/{id}', [AdminController::class, 'change_pdf'])->name('change_pdf')->middleware(['auth', 'admin']);

Route::get('/view_brand', [AdminController::class,'view_brand'])->name('view_brand')->middleware(['auth', 'admin']);
Route::post('/add_brand', [AdminController::class,'add_brand'])->name('add_brand')->middleware(['auth', 'admin']);
Route::get('/delete_brand/{id}', [AdminController::class, 'delete_brand'])->name('delete_brand')->middleware(['auth', 'admin']);
Route::get('/edit_brand/{id}', [AdminController::class, 'edit_brand'])->name('edit_brand')->middleware(['auth', 'admin']);
Route::post('/update_brand/{id}', [AdminController::class, 'update_brand'])->name('update_brand')->middleware(['auth', 'admin']);

Route::get('/showcontact', [AdminController::class, 'showcontact'])->name('showcontact')->middleware(['auth', 'admin']);
Route::get('/deletecontact/{id}', [AdminController::class, 'deletecontact'])->name('deletecontact')->middleware(['auth', 'admin']);

Route::get('/banershow', [AdminController::class,'banershow'])->name('banershow')->middleware(['auth', 'admin']);
Route::post('/banersave', [AdminController::class,'banersave'])->name('banersave')->middleware(['auth', 'admin']);
Route::get('/edit_baner/{id}', [AdminController::class, 'edit_baner'])->name('edit_baner')->middleware(['auth', 'admin']);
Route::post('/update_baner/{id}', [AdminController::class, 'update_baner'])->name('update_baner')->middleware(['auth', 'admin']);
Route::get('/delete_baner/{id}', [AdminController::class, 'delete_baner'])->name('delete_baner')->middleware(['auth', 'admin']);







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
Route::post('/contactsave', [HomeController::class,'contactsave'])->name('home.contactsave')->middleware(['auth', 'verified']);


Route::post('/add_comment', [HomeController::class,'add_comment'])->name('add_comment');
Route::post('/add_reply', [HomeController::class,'add_reply'])->name('add_reply');


//All home routes end


Route::get('/stripe/{value}', [HomeController::class, 'stripe'])->name('home.stripe');
Route::post('/process-payment/{value}', [HomeController::class, 'processPayment'])->name('home.payment');

