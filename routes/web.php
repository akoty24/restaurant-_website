<?php

use App\Http\Controllers\admin\FooterController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\BookTableController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ChefsController;
use App\Http\Controllers\admin\ConfirmedBookTableController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\CoverController;
use App\Http\Controllers\admin\EventsController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\WhyChooseYummyController;
use App\Http\Controllers\FrontendController;





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Home
Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {
    Route::post('/sendMessage', [FrontendController::class, 'sendMessage'])->name('send.message');
    Route::post('/bookTable', [FrontendController::class, 'submitBookTable'])->middleware('auth')->name('submitBookTable');
});
//admin
Route::middleware(['auth','auth.admin'])->group(function () {
//admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'admin'], function () {
//cover
        Route::group(['prefix' => 'cover'], function () {
            Route::get('/', [CoverController::class, 'index'])->name('cover');
            Route::post('update', [CoverController::class, 'update'])->name('cover.update');
        });
//about
        Route::group(['prefix' => 'about'], function () {
            Route::get('/', [AboutController::class, 'index'])->name('about');
            Route::post('update', [AboutController::class, 'update'])->name('about.update');
        });
//why choose yummy
        Route::group(['prefix' => 'WhyChooseYummyController'], function () {
            Route::get('/', [WhyChooseYummyController::class, 'index'])->name('WhyChooseYummy');
            Route::post('update', [WhyChooseYummyController::class, 'update'])->name('WhyChooseYummy.update');
        });
//Testimonials
        Route::group(['prefix' => 'testimonial'], function () {
            Route::get('/', [TestimonialController::class, 'index'])->name('testimonial');
            Route::post('store', [TestimonialController::class, 'store'])->name('testimonial.store');
            Route::get('edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
            Route::post('update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
            Route::get('delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');
        });
//Event
        Route::group(['prefix' => 'event'], function () {
            Route::get('/', [EventsController::class, 'index'])->name('event');
            Route::post('store', [EventsController::class, 'store'])->name('event.store');
            Route::get('edit/{id}', [EventsController::class, 'edit'])->name('event.edit');
            Route::post('update/{id}', [EventsController::class, 'update'])->name('event.update');
            Route::get('delete/{id}', [EventsController::class, 'delete'])->name('event.delete');

        });
//Chefs
        Route::group(['prefix' => 'chef'], function () {
            Route::get('/', [ChefsController::class, 'index'])->name('chef');
            Route::post('store', [ChefsController::class, 'store'])->name('chef.store');
            Route::get('edit/{id}', [ChefsController::class, 'edit'])->name('chef.edit');
            Route::post('update/{id}', [ChefsController::class, 'update'])->name('chef.update');
            Route::get('delete/{id}', [ChefsController::class, 'delete'])->name('chef.delete');
        });
//Gallery
        Route::group(['prefix' => 'gallery'], function () {
            Route::get('/', [GalleryController::class, 'index'])->name('gallery');
            Route::post('store', [GalleryController::class, 'store'])->name('gallery.store');
            Route::get('delete/{id}', [GalleryController::class, 'delete'])->name('gallery.delete');
        });
//contact
        Route::group(['prefix' => 'contact'], function () {
            Route::get('/', [ContactController::class, 'index'])->name('contact');
            Route::post('update', [ContactController::class, 'update'])->name('contact.update');
        });
        //footer
        Route::group(['prefix' => 'footer'], function () {
            Route::get('/', [FooterController::class, 'index'])->name('footer');
            Route::post('update', [FooterController::class, 'update'])->name('footer.update');
        });
//Category
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category');
            Route::post('store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        });
//Product
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('product');
            Route::get('create', [ProductController::class, 'create'])->name('product.create');
            Route::post('store', [ProductController::class, 'store'])->name('product.store');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        });
//BookTable
        Route::group(['prefix' => 'bookedTable'], function () {
            Route::get('/', [BookTableController::class, 'index'])->name('book_table');
            Route::get('create', [BookTableController::class, 'create'])->name('book_table.create');
            Route::post('store', [BookTableController::class, 'store'])->name('book_table.store');
            Route::get('edit/{id}', [BookTableController::class, 'edit'])->name('book_table.edit');
            Route::post('update/{id}', [BookTableController::class, 'update'])->name('book_table.update');
            Route::get('delete/{id}', [BookTableController::class, 'delete'])->name('book_table.delete');
        });
//Confirm Book Table
        Route::group(['prefix' => 'ConfirmedBookTable'], function () {
            Route::get('/', [ConfirmedBookTableController::class, 'index'])->name('ConfirmedBookTable');;
            Route::get('delete/{id}', [ConfirmedBookTableController::class, 'delete'])->name('ConfirmedBookTable.delete');;
            Route::post('confirmFromHome/{id}', [ConfirmedBookTableController::class, 'confirmFromHome'])->name('ConfirmedBookTable.confirmFromHome');;
        });
//Users
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index'])->name('user');
            Route::get('create', [UserController::class, 'create'])->name('user.create');
            Route::post('store', [UserController::class, 'store'])->name('user.store');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
            Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        });
        //messages
        Route::group(['prefix' => 'message'], function () {
            Route::get('/', [MessageController::class, 'index'])->name('message');
        });
    });
});
