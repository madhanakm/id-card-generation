<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\FrontPagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\InstallController;
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

// Auth

// Dashboard
Route::prefix('admin')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login')
        ->middleware('guest');

    Route::get('register', [AuthenticatedSessionController::class, 'register'])
        ->name('register')
        ->middleware('guest');

    Route::get('password-reset', [AuthenticatedSessionController::class, 'forgotPassword'])->name('password.reset')->middleware('guest');
    Route::post('password-reset-email', [AuthenticatedSessionController::class, 'forgotPasswordMail'])->name('password.reset.email')->middleware('guest');
    Route::get('password-reset/{token}', [AuthenticatedSessionController::class, 'forgotPasswordToken'])->name('password.reset.token')->middleware('guest');
    Route::post('password-reset-confirm', [AuthenticatedSessionController::class, 'forgotPasswordStore'])->name('password.reset.store')->middleware('guest');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store')
        ->middleware('guest');

    Route::post('register', [AuthenticatedSessionController::class, 'registerStore'])
        ->name('register.store')
        ->middleware('guest');

    Route::get('password-reset', [AuthenticatedSessionController::class, 'forgotPassword'])->name('password.reset')->middleware('guest');
    Route::post('password-reset-email', [AuthenticatedSessionController::class, 'forgotPasswordMail'])->name('password.reset.email')->middleware('guest');
    Route::get('password-reset/{token}', [AuthenticatedSessionController::class, 'forgotPasswordToken'])->name('password.reset.token')->middleware('guest');
    Route::post('password-reset-confirm', [AuthenticatedSessionController::class, 'forgotPasswordStore'])->name('password.reset.store')->middleware('guest');


    Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware('auth');

    /** Contact Functions */
    Route::get('notes', [NotesController::class, 'index'])
        ->name('notes')
        ->middleware('auth');

    Route::get('cards', [CardsController::class, 'index'])
        ->name('cards')
        ->middleware('auth');

    // New code
    Route::get('cards/create', [CardsController::class, 'create'])
        ->name('cards.create')
        ->middleware('auth');

    Route::post('cards', [CardsController::class, 'store'])
        ->name('cards.store')
        ->middleware('auth');

    Route::get('cards/{card}/edit', [CardsController::class, 'edit'])
        ->name('cards.edit')
        ->middleware('auth');

    Route::put('cards/{contact}', [CardsController::class, 'update'])
        ->name('cards.update')
        ->middleware('auth');

    Route::delete('cards/{contact}', [CardsController::class, 'destroy'])
        ->name('cards.destroy')
        ->middleware('auth');
    // New code

    Route::post('notes/{id?}', [NotesController::class, 'saveNote'])
        ->name('notes.save')
        ->middleware('auth');

    Route::delete('notes/{note?}', [NotesController::class, 'delete'])
        ->name('notes.delete')
        ->middleware('auth');

    Route::get('contacts', [ContactsController::class, 'index'])
        ->name('contacts')
        ->middleware('auth');

    Route::get('contacts/create', [ContactsController::class, 'create'])
        ->name('contacts.create')
        ->middleware('auth');

    Route::post('contacts', [ContactsController::class, 'store'])
        ->name('contacts.store')
        ->middleware('auth');

    Route::get('contacts/{contact}/edit', [ContactsController::class, 'edit'])
        ->name('contacts.edit')
        ->middleware('auth');

    Route::put('contacts/{contact}', [ContactsController::class, 'update'])
        ->name('contacts.update')
        ->middleware('auth');

    Route::delete('contacts/{contact}', [ContactsController::class, 'destroy'])
        ->name('contacts.destroy')
        ->middleware('auth');

    Route::put('contacts/{contact}/restore', [ContactsController::class, 'restore'])
        ->name('contacts.restore')
        ->middleware('auth');

    /** Contact Functions */

    Route::get('users', [UsersController::class, 'index'])
        ->name('users')
        ->middleware('auth');


    Route::get('users/create', [UsersController::class, 'create'])
        ->name('users.create')
        ->middleware('auth');

    Route::post('users', [UsersController::class, 'store'])
        ->name('users.store')
        ->middleware('auth');

    Route::get('users/{user}/edit', [UsersController::class, 'edit'])
        ->name('users.edit')
        ->middleware('auth');

    Route::get('edit_profile', [DashboardController::class, 'editProfile'])
        ->name('users.edit.profile')
        ->middleware('auth');

    Route::put('users/{user}', [UsersController::class, 'update'])
        ->name('users.update')
        ->middleware('auth');

    Route::delete('users/{user}', [UsersController::class, 'destroy'])
        ->name('users.destroy')
        ->middleware('auth');

    Route::put('users/{user}/restore', [UsersController::class, 'restore'])
        ->name('users.restore')
        ->middleware('auth');


    // Organizations

    Route::get('organizations', [OrganizationsController::class, 'index'])
        ->name('organizations')
        ->middleware('auth');

    Route::get('organizations/create', [OrganizationsController::class, 'create'])
        ->name('organizations.create')
        ->middleware('auth');

    Route::post('organizations', [OrganizationsController::class, 'store'])
        ->name('organizations.store')
        ->middleware('auth');

    Route::get('organizations/{organization}/edit', [OrganizationsController::class, 'edit'])
        ->name('organizations.edit')
        ->middleware('auth');

    Route::put('organizations/{organization}', [OrganizationsController::class, 'update'])
        ->name('organizations.update')
        ->middleware('auth');

    Route::delete('organizations/{organization}', [OrganizationsController::class, 'destroy'])
        ->name('organizations.destroy')
        ->middleware('auth');

    Route::put('organizations/{organization}/restore', [OrganizationsController::class, 'restore'])
        ->name('organizations.restore')
        ->middleware('auth');

    // Languages
    Route::get('settings/languages', [LanguagesController::class, 'index'])
        ->name('languages')
        ->middleware('auth');

    Route::get('settings/languages/{language}/edit', [LanguagesController::class, 'edit'])
        ->name('languages.edit')
        ->middleware('auth');

    Route::put('settings/languages/{language}', [LanguagesController::class, 'update'])
        ->name('languages.update')
        ->middleware('auth');

    Route::get('settings/global', [SettingsController::class, 'index'])
        ->name('global')
        ->middleware('auth');
    Route::post('settings/global', [SettingsController::class, 'update'])
        ->name('global.update')
        ->middleware('auth');
    Route::get('settings/smtp', [SettingsController::class, 'smtp'])
        ->name('settings.smtp')
        ->middleware('auth');
    Route::put('settings/smtp/update', [SettingsController::class, 'updateSmtp'])
        ->name('settings.smtp.update')
        ->middleware('auth');
    Route::put('artisan/{slug}', [SettingsController::class, 'artisan'])
        ->name('settings.artisan')
        ->middleware('auth');
    // End - Lanuages

    /** Front Page Setup */
    Route::get('front_pages/{slug}', [FrontPagesController::class, 'page'])
        ->name('front_pages.page')
        ->middleware('auth');

    Route::put('front_pages/{slug}', [FrontPagesController::class, 'update'])
        ->name('front_pages.update')
        ->middleware('auth');

    Route::post('/upload/image', [FrontPagesController::class, 'uploadImage'])
        ->name('upload.image')
        ->middleware('auth');

    /** Blog Route */
    Route::get('posts', [BlogController::class, 'index'])
        ->name('posts')
        ->middleware('auth');

    Route::get('posts/create', [BlogController::class, 'create'])
        ->name('posts.create')
        ->middleware('auth');

    Route::post('posts', [BlogController::class, 'store'])
        ->name('posts.store')
        ->middleware('auth');

    Route::get('posts/{post}/edit', [BlogController::class, 'edit'])
        ->name('posts.edit')
        ->middleware('auth');

    Route::put('posts/{post}', [BlogController::class, 'update'])
        ->name('posts.update')
        ->middleware('auth');

    Route::delete('posts/{post}', [BlogController::class, 'destroy'])
        ->name('posts.destroy')
        ->middleware('auth');
// End - Blog

    /** Faq Route */
    Route::get('faqs', [FaqsController::class, 'index'])
        ->name('faqs')
        ->middleware('auth');

    Route::get('faqs/create', [FaqsController::class, 'create'])
        ->name('faqs.create')
        ->middleware('auth');

    Route::post('faqs', [FaqsController::class, 'store'])
        ->name('faqs.store')
        ->middleware('auth');

    Route::get('faqs/{faq}/edit', [FaqsController::class, 'edit'])
        ->name('faqs.edit')
        ->middleware('auth');

    Route::put('faqs/{faq}', [FaqsController::class, 'update'])
        ->name('faqs.update')
        ->middleware('auth');

    Route::delete('faqs/{faq}', [FaqsController::class, 'destroy'])
        ->name('faqs.destroy')
        ->middleware('auth');

    Route::put('faqs/{faq}/restore', [FaqsController::class, 'restore'])
        ->name('faqs.restore')
        ->middleware('auth');

    // Types
    Route::get('settings/types', [TypesController::class, 'index'])
        ->name('types')
        ->middleware('auth');

    Route::get('settings/types/create', [TypesController::class, 'create'])
        ->name('types.create')
        ->middleware('auth');

    Route::post('settings/types', [TypesController::class, 'store'])
        ->name('types.store')
        ->middleware('auth');

    Route::get('settings/types/{type}/edit', [TypesController::class, 'edit'])
        ->name('types.edit')
        ->middleware('auth');

    Route::put('settings/types/{type}', [TypesController::class, 'update'])
        ->name('types.update')
        ->middleware('auth');
    Route::put('settings/types/{type}/restore', [TypesController::class, 'restore'])
        ->name('types.restore')
        ->middleware('auth');

    Route::delete('settings/types/{type}', [TypesController::class, 'destroy'])
        ->name('types.destroy')
        ->middleware('auth');
// End - Types
});



/** Language Selector  */
Route::get('/language/{language}', [HomeController::class, 'setLocale'])
    ->name('language');

/** Site Front-Landing */
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::post('/createQr', [HomeController::class, 'createQr'])
    ->name('create.qr');

Route::post('/generateQr', [HomeController::class, 'generateQr'])
    ->name('generate.qr');

Route::post('/importFile', [HomeController::class, 'importFile'])
    ->name('import.file');

Route::post('/uploadSchoolLogo', [HomeController::class, 'uploadSchoolLogo'])
    ->name('upload.school_logo');

Route::post('/saveUserData', [HomeController::class, 'saveUserData'])
    ->name('save.user.data');

// Custom Pages
Route::get('terms-of-services', [PageController::class, 'terms'])
    ->name('terms_service');

Route::get('privacy', [PageController::class, 'privacy'])
    ->name('privacy');

Route::get('contact', [PageController::class, 'contact'])
    ->name('contact');

Route::post('contact', [PageController::class, 'contactPost'])
    ->name('contact.send');

Route::get('faq', [PageController::class, 'faq'])
    ->name('faq');

Route::get('about-us', [PageController::class, 'about'])
    ->name('about');

Route::get('team', [PageController::class, 'team'])
    ->name('team');

Route::get('our-services', [PageController::class, 'services'])
    ->name('our_services');

Route::get('blog/type/{typeId}', [PageController::class, 'blogByType'])
    ->name('blog.by_type');

Route::get('blog', [PageController::class, 'blog'])
    ->name('blog');

Route::get('blog/{post}', [PageController::class, 'blogDetails'])
    ->name('blog.details');
// Custom Pages

/** Newsletter Subscribe */
Route::post('subscribe/news', [SubscriptionController::class, 'subscribe'])->name('subscribe.news');
/** Newsletter Subscribe */


Route::get('/test', [LogsController::class, 'test'])->name('log.test');
Route::get('/check/update', [BackupController::class, 'checkUpdate'])->name('check.update');

/** Installation Steps */
//Route::get('/install/init', [InstallController::class, 'init'])->name('install.init');
//Route::get('/install/pre_installation', [InstallController::class, 'pre_installation'])->name('install.pre_installation');
//Route::get('/install/purchase_code', [InstallController::class, 'purchase_code'])->name('install.purchase_code');
//Route::post('/install/purchase_code/verify', [InstallController::class, 'purchaseCodeVerify'])->name('install.purchase_code.verify');
//Route::get('/install/database_setup', [InstallController::class, 'database_setup'])->name('install.database_setup');
//Route::get('/install/mail_setup', [InstallController::class, 'mail_setup'])->name('install.mail_setup');
//Route::post('/install/mail_setup', [InstallController::class, 'mailSetupStore'])->name('install.mail_setup.save');
//Route::get('/install/admin_setup', [InstallController::class, 'admin_setup'])->name('install.admin_setup');
//Route::post('/install/database_installation', [InstallController::class, 'database_installation'])->name('install.db');
//Route::post('/install/system_settings', [InstallController::class, 'adminSetupSave'])->name('install.admin_setup.save');
//Route::get('/install/migrate', [InstallController::class, 'migrate'])->name('install.migrate');

Route::get('/complete/welcome', [InstallController::class, 'welcome'])->name('welcome');


