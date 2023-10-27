<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


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

Route::get('/dashboard', [PageController::class, 'index'])->name('home');
Route::get('/', [PageController::class, 'index'])->name('home');
Route::prefix('home')->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/product', [PageController::class, 'shop'])->name('shop');
    Route::get('/product/caterory/{id}', [PageController::class, 'category'])->name('shop.category');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/blog', [PageController::class, 'blog'])->name('blog');
    Route::get('/blog/detail/{id}', [PageController::class, 'blog_detail'])->name('blog_detail');
    Route::get('/contact', [ContactController::class, 'create'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact');
    
    // Route::get('/blog', [CommentController::class, 'comment'])->name('comment');
    Route::post('/blog/detail', [CommentController::class, 'comment'])->name('comment');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    
});
Route::prefix('cart')->group(function () {
    Route::get('/{id}', [CartController::class, 'Addcart'])->name('cart.add');
    Route::get('/', [CartController::class, 'cart'])->name('cart');
    Route::patch('/update', [CartController::class, 'UpdateCart'])->name('cart_update');
    Route::delete('/delete', [CartController::class, 'RemoveCart'])->name('cart_remove');
    Route::get('/o/checkout', [CartController::class, 'create'])->name('cart.checkout');
    Route::post('/o/checkout', [CartController::class, 'store'])->name('cart.store');
    Route::post('/district', [CartController::class, 'district'])->name('cart.district');
    
    // Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/checkout/success', [CartController::class, 'success'])->name('cart.success');
    
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';