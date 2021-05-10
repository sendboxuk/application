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
Route::any('debug', function () {


    $service = App\Models\Service::find(1);
    $service->update(
        [
        'name' => 'Test',
        'emails' => 'sadas',
        'template_id' => 4
    ]);

});

Route::group(['prefix' => '/', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/email-audits', [App\Http\Controllers\AuditController::class, 'email_audits'])->name('audit.emails');
    Route::get('/email-audits/{id}/view', [App\Http\Controllers\AuditController::class, 'email_audit_view'])->name('audit.emails.view');
    Route::get('/email-audits/{id}/render', [App\Http\Controllers\AuditController::class, 'render_mail'])->name('audit.emails.render_mail');

    Route::get('/api-audits', [App\Http\Controllers\AuditController::class, 'api_audits'])->name('audit.api');
    Route::get('/api-audits/{id}/view', [App\Http\Controllers\AuditController::class, 'api_audit_view'])->name('audit.api.view');
    Route::get('/api-audits/{id}/resend', [App\Http\Controllers\AuditController::class, 'resend'])->name('audit.emails.resend');


    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::get('/products/{product}/view', [App\Http\Controllers\ProductController::class, 'view'])->name('products.view');
    Route::get('/products/{product}/send', [App\Http\Controllers\ProductController::class, 'send'])->name('products.send');
    Route::post('/products/{product}/send', [App\Http\Controllers\ProductController::class, 'sent'])->name('products.sent');

    Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('services.create');
    Route::get('/services/{service}/edit', [App\Http\Controllers\ServiceController::class, 'edit'])->name('services.edit');
    Route::get('/services/{service}/view', [App\Http\Controllers\ServiceController::class, 'view'])->name('services.view');
    Route::get('/services/{service}/send', [App\Http\Controllers\ServiceController::class, 'send'])->name('services.send');
    Route::post('/services/{service}/send', [App\Http\Controllers\ServiceController::class, 'sent'])->name('services.sent');


    Route::get('/templates', [App\Http\Controllers\TemplateController::class, 'index'])->name('templates.index');
    Route::get('/templates/create', [App\Http\Controllers\TemplateController::class, 'create'])->name('templates.create');
    Route::get('/templates/{template}/view', [App\Http\Controllers\TemplateController::class, 'view'])->name('templates.view');
    Route::get('/templates/{template}/edit', [App\Http\Controllers\TemplateController::class, 'edit'])->name('templates.edit');
    Route::get('/templates/{template}/email', [App\Http\Controllers\TemplateController::class, 'email'])->name('templates.email');    
    Route::post('/templates/{template}/save_email', [App\Http\Controllers\TemplateController::class, 'save_email'])->name('templates.save_email');    
    Route::get('/templates/{template}/send', [App\Http\Controllers\TemplateController::class, 'send'])->name('templates.send');
    Route::get('/templates/{template}/sent', [App\Http\Controllers\TemplateController::class, 'sent'])->name('templates.sent');

    Route::get('/settings', [App\Http\Controllers\SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');

    Route::post('/regenerate-token', [App\Http\Controllers\SettingController::class, 'regenerate_token'])->name('settings.regenerate-token');    

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
Auth::routes();

