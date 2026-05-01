<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\CatalogueController as AdminCatalogueController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [HomeController::class, 'apropos'])->name('apropos');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/nos-projets', [ProjectController::class, 'index'])->name('projets');
Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/actualites', [ArticleController::class, 'index'])->name('actualites');
Route::get('/actualites/{slug}', [ArticleController::class, 'show'])->name('actualites.show');

// ── Admin ──────────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('services', AdminServiceController::class)->except(['show']);
        Route::resource('projets', AdminProjectController::class)->except(['show'])->parameters(['projets' => 'projet']);
        Route::resource('catalogue', AdminCatalogueController::class)->except(['show']);

        Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::resource('equipe', TeamMemberController::class)->except(['show'])->parameters(['equipe' => 'equipe']);

        Route::resource('articles', AdminArticleController::class)->except(['show']);
        Route::resource('pages', AdminPageController::class)->except(['show']);
        Route::get('pages/{nom}/contenu', [AdminPageController::class, 'contenu'])->name('pages.contenu');
        Route::put('pages/{nom}/contenu', [AdminPageController::class, 'contenuUpdate'])->name('pages.contenu.update');

        Route::get('parametres', [SettingController::class, 'index'])->name('parametres.index');
        Route::put('parametres', [SettingController::class, 'update'])->name('parametres.update');
    });
});

// ── Pages personnalisées (catch-all — doit être en dernier) ────────────────
Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');
