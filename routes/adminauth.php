<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\AdminAuth\PasswordController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileAdminController;

Route::middleware(['guest:admin'])->group(function () {

    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
                ->name('admin.login');
    // Route::get('admin/', [AuthenticatedSessionController::class, 'create'])
    //             ->name('admin.login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('admin.password.request');

    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('admin.password.email');

    Route::get('admin/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('admin.password.reset');

    Route::post('admin/reset-password', [NewPasswordController::class, 'store'])
                ->name('admin.password.store');
    
  
    
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    
});

Route::group([ 'middleware'=>['guest:admin','auth:admin'],'prefix' => 'admin'], function() {
    
    Route::get('/category/trashed', [CategoryController::class, 'trashed'])->name('category.trashed');
    Route::get('/category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    
    Route::get('/product/trashed', [ProductController::class, 'trashed'])->name('product.trashed');
    Route::get('/product/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    
    Route::get('/user/trashed', [UserController::class, 'trashed'])->name('user.trashed');
    Route::get('/user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    
    Route::get('/blog/trashed', [BlogController::class, 'trashed'])->name('blog.trashed');
    Route::get('/blog/restore/{id}', [BlogController::class, 'restore'])->name('blog.restore');
    Route::get('/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
    
    Route::get('/contact/trashed', [ContactController::class, 'trashed'])->name('contact.trashed');
    Route::get('/contact/restore/{id}', [ContactController::class, 'restore'])->name('contact.restore');
    Route::get('/contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
    
    Route::get('/skill/trashed', [SkillController::class, 'trashed'])->name('skill.trashed');
    Route::get('/skill/restore/{id}', [SkillController::class, 'restore'])->name('skill.restore');
    Route::get('/skill/delete/{id}', [SkillController::class, 'delete'])->name('skill.delete');
    
    Route::get('/comment/trashed', [CommentController::class, 'trashed'])->name('comment.trashed');
    Route::get('/comment/restore/{id}', [CommentController::class, 'restore'])->name('comment.restore');
    Route::get('/comment/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');
    
    Route::get('/skill/trashed', [SkillController::class, 'trashed'])->name('skill.trashed');
    Route::get('/skill/restore/{id}', [SkillController::class, 'restore'])->name('skill.restore');
    Route::get('/skill/delete/{id}', [SkillController::class, 'delete'])->name('skill.delete');
    
    Route::get('/order/trashed', [OrderController::class, 'trashed'])->name('order.trashed');
    Route::get('/order/restore/{id}', [OrderController::class, 'restore'])->name('order.restore');
    Route::get('/order/delete/{id}', [OrderController::class, 'delete'])->name('order.delete');
    
    Route::get('/banner/trashed', [BannerController::class, 'trashed'])->name('banner.trashed');
    Route::get('/banner/restore/{id}', [BannerController::class, 'restore'])->name('banner.restore');
    Route::get('/banner/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');
    
    Route::get('/contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::delete('/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
    Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('/contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
    // Route::delete('/contact/index/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
    
    // Route::get('/comment/index', [CommentController::class, 'index'])->name('comment.index');
    
    
    Route::resources([
        'category'=> CategoryController::class,
        'product'=> ProductController::class,
        'user' =>UserController::class,
        'blog' => BlogController::class,
        'banner' => BannerController::class,
        'skill' => SkillController::class,
        'comment' => CommentController::class,
        'order' => OrderController::class,
    ]);
});

Route::middleware('auth:admin')->group(function () {
    
    Route::get('admin/profile', [ProfileAdminController::class, 'index'])->name('admin.profile');

    Route::get('admin/verify-email', EmailVerificationPromptController::class)
                ->name('admin.verification.notice');

    Route::get('admin/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('admin.verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('admin.verification.send');

    Route::get('admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('admin.password.confirm');

    Route::post('admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('admin/password', [PasswordController::class, 'update'])->name('admin.password.update');

    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('admin.logout');
});
