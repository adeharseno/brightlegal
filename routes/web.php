<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\Cms\BannerController;
use App\Http\Controllers\Cms\StatisticController;
use App\Http\Controllers\Cms\WhyWorkWithUsController;
use App\Http\Controllers\Cms\ServiceController;
use App\Http\Controllers\Cms\TestimonialController;
use App\Http\Controllers\Cms\FaqController;
use App\Http\Controllers\Cms\ReadyToTalkController;

Route::get('/staging', [HomeController::class, 'index'])->name('home');
Route::get('/staging/our-services', [HomeController::class, 'ourServices'])->name('our-services');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// CMS Routes (Protected)
Route::middleware(['auth'])->prefix('cms')->name('cms.')->group(function () {
    Route::get('/', [CmsController::class, 'index'])->name('index');
    
    // Banners
    Route::resource('banners', BannerController::class)->except(['show']);
    
    // Statistics (Section 2)
    Route::resource('statistics', StatisticController::class)->except(['show']);
    
    // Why Work With Us
    Route::get('why-work-with-us', [WhyWorkWithUsController::class, 'index'])->name('why-work-with-us.index');
    Route::get('why-work-with-us/settings', [WhyWorkWithUsController::class, 'settingsEdit'])->name('why-work-with-us.settings');
    Route::put('why-work-with-us/settings', [WhyWorkWithUsController::class, 'settingsUpdate'])->name('why-work-with-us.settings.update');
    Route::get('why-work-with-us/create', [WhyWorkWithUsController::class, 'create'])->name('why-work-with-us.create');
    Route::post('why-work-with-us', [WhyWorkWithUsController::class, 'store'])->name('why-work-with-us.store');
    Route::get('why-work-with-us/{card}/edit', [WhyWorkWithUsController::class, 'edit'])->name('why-work-with-us.edit');
    Route::put('why-work-with-us/{card}', [WhyWorkWithUsController::class, 'update'])->name('why-work-with-us.update');
    Route::delete('why-work-with-us/{card}', [WhyWorkWithUsController::class, 'destroy'])->name('why-work-with-us.destroy');
    
    // Services
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/settings', [ServiceController::class, 'settingsEdit'])->name('services.settings');
    Route::put('services/settings', [ServiceController::class, 'settingsUpdate'])->name('services.settings.update');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    
    // Service Categories
    Route::get('services/categories', [ServiceController::class, 'categoriesIndex'])->name('services.categories.index');
    Route::get('services/categories/create', [ServiceController::class, 'categoriesCreate'])->name('services.categories.create');
    Route::post('services/categories', [ServiceController::class, 'categoriesStore'])->name('services.categories.store');
    Route::get('services/categories/{category}/edit', [ServiceController::class, 'categoriesEdit'])->name('services.categories.edit');
    Route::put('services/categories/{category}', [ServiceController::class, 'categoriesUpdate'])->name('services.categories.update');
    Route::delete('services/categories/{category}', [ServiceController::class, 'categoriesDestroy'])->name('services.categories.destroy');
    
    // Testimonials
    Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('testimonials/settings', [TestimonialController::class, 'settingsEdit'])->name('testimonials.settings');
    Route::put('testimonials/settings', [TestimonialController::class, 'settingsUpdate'])->name('testimonials.settings.update');
    Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
    
    // FAQs
    Route::get('faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('faqs/settings', [FaqController::class, 'settingsEdit'])->name('faqs.settings');
    Route::put('faqs/settings', [FaqController::class, 'settingsUpdate'])->name('faqs.settings.update');
    Route::get('faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');
    
    // Ready to Talk
    Route::get('ready-to-talk', [ReadyToTalkController::class, 'index'])->name('ready-to-talk.index');
    Route::put('ready-to-talk', [ReadyToTalkController::class, 'update'])->name('ready-to-talk.update');
});
