<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/nirapod-admin', function () {
    return view('backend.index');
})->name('dashboard')->middleware('auth');

Route::get('clear-cache',function(){
    Artisan::call('cache:clear');    
    Artisan::call('config:clear');
    Artisan::call('view:clear');  
    Artisan::call('route:clear');
    return back()->with('success','Cache clear successfully!');
})->name('clear.cache');
Route::get('reseller-hosting',[App\Http\Controllers\Frontend\HomeController::class,'Reseller'])->name('reseller');
Route::get('blog/{slug?}',[App\Http\Controllers\Frontend\HomeController::class,'Blog'])->name('blog');
Route::get('why-nirapod-host',[App\Http\Controllers\Frontend\HomeController::class,'WhyNirapodHost'])->name('why.nirapod.host');
Route::get('web-hosting',[App\Http\Controllers\Frontend\HomeController::class,'WebHosting'])->name('web.hosting');
Route::get('dedicated-server',[App\Http\Controllers\Frontend\HomeController::class,'DedicatedServer'])->name('dedicated.server');
Route::get('vps-server',[App\Http\Controllers\Frontend\HomeController::class,'VpsServer'])->name('vps.server');
Route::get('contact-us',[App\Http\Controllers\Frontend\HomeController::class,'ContactUs'])->name('contact.us');
Route::post('send',[App\Http\Controllers\Frontend\HomeController::class,'SendEmail'])->name('send.email');
Route::post('subscribe-store',[App\Http\Controllers\Frontend\HomeController::class,'SubscribeStore'])->name('subscribe.store');
Route::post('comment-store',[App\Http\Controllers\Frontend\HomeController::class,'CommentStore'])->name('comment.store');
Route::post('comment-reply',[App\Http\Controllers\Frontend\HomeController::class,'CommentReply'])->name('comment.reply');


Route::middleware(['auth:sanctum', 'verified'])->prefix('nirapod-admin')->group(function () {
    Route::get('information-collect',[App\Http\Controllers\Backend\StudentController::class,'InformationCollect'])->name('information.collect');
    Route::get('information-edit/{id}',[App\Http\Controllers\Backend\StudentController::class,'InformationEdit'])->name('information.edit');
    Route::get('subscriber-list',[App\Http\Controllers\Backend\StudentController::class,'SubscriberList'])->name('subscriber.list');
    Route::get('information-list',[App\Http\Controllers\Backend\StudentController::class,'InformationList'])->name('information.list');
    Route::post('information-update/{id}',[App\Http\Controllers\Backend\StudentController::class,'InformationUpdate'])->name('information.update');
    Route::post('information-store',[App\Http\Controllers\Backend\StudentController::class,'InformationStore'])->name('information.store');
    Route::get('category',[App\Http\Controllers\Backend\DashboardController::class,'Category'])->name('category');
    Route::get('add-category',[App\Http\Controllers\Backend\DashboardController::class,'AddCategory'])->name('add.category');
    Route::get('edit-category/{id}',[App\Http\Controllers\Backend\DashboardController::class,'EditCategory'])->name('edit.category');
    Route::get('delete-category/{id}',[App\Http\Controllers\Backend\DashboardController::class,'DeleteCategory'])->name('delete.category');
    Route::post('update-category/{id}',[App\Http\Controllers\Backend\DashboardController::class,'UpdateCategory'])->name('update.category');
    Route::post('store-category',[App\Http\Controllers\Backend\DashboardController::class,'StoreCategory'])->name('store.category');
    Route::get('admission',[App\Http\Controllers\Backend\DashboardController::class,'Admission'])->name('admission');
    Route::post('account-update',[App\Http\Controllers\Backend\DashboardController::class,'AccountUpdate'])->name('account.update');
    Route::get('my-profile',[App\Http\Controllers\Backend\DashboardController::class,'MyProfile'])->name('my.profile');
    Route::post('admission.store',[App\Http\Controllers\Backend\DashboardController::class,'AdmissionStore'])->name('admission.store');
    Route::post('settings-store',[App\Http\Controllers\Backend\DashboardController::class,'SettingsStore'])->name('settings.store');
    Route::get('header-setup',[App\Http\Controllers\Backend\HeaderController::class,'HeaderSetup'])->name('header.setup');
    Route::get('slider-setup',[App\Http\Controllers\Backend\HeaderController::class,'SliderSetup'])->name('slider.setup');
    Route::get('packages',[App\Http\Controllers\Backend\HeaderController::class,'HomePackage'])->name('package');
    Route::get('add-package',[App\Http\Controllers\Backend\HeaderController::class,'AddPackage'])->name('add.package');
    Route::get('edit-package/{id}',[App\Http\Controllers\Backend\HeaderController::class,'EditPackage'])->name('edit.package');
    Route::get('delete-package/{id}',[App\Http\Controllers\Backend\HeaderController::class,'DeletePackage'])->name('delete.package');
    Route::post('store-package',[App\Http\Controllers\Backend\HeaderController::class,'StorePackage'])->name('store.package');
    Route::post('update-package/{id}',[App\Http\Controllers\Backend\HeaderController::class,'UpdatePackage'])->name('update.package');
    Route::get('load-balancing',[App\Http\Controllers\Backend\DashboardController::class,'LoadBalance'])->name('load.balancing');
    Route::get('why-choose',[App\Http\Controllers\Backend\DashboardController::class,'WhyChoose'])->name('why.choose');
    Route::get('reviews',[App\Http\Controllers\Backend\DashboardController::class,'Review'])->name('reviews');
    Route::get('add-review',[App\Http\Controllers\Backend\DashboardController::class,'AddReview'])->name('add.review');
    Route::get('delete-review/{id}',[App\Http\Controllers\Backend\DashboardController::class,'deleteReview'])->name('delete.review');
    Route::post('store-review',[App\Http\Controllers\Backend\DashboardController::class,'StoreReview'])->name('store.review');
    Route::get('review-setup',[App\Http\Controllers\Backend\HeaderController::class,'reviewSetup'])->name('review.setup');
    Route::get('footer-up-setup',[App\Http\Controllers\Backend\HeaderController::class,'FooterUpSetup'])->name('footer-up.setup');
    Route::get('reseller-header-setup',[App\Http\Controllers\Backend\HeaderController::class,'ResellerHeader'])->name('reseller.header.setup');
    Route::get('reseller-option-setup',[App\Http\Controllers\Backend\HeaderController::class,'ResellerOptionOne'])->name('reseller.option.one.setup');
    Route::get('reseller-option-add',[App\Http\Controllers\Backend\HeaderController::class,'ResellerOptionAdd'])->name('reseller.option.add');
    Route::get('reseller-option-delete/{id}',[App\Http\Controllers\Backend\HeaderController::class,'ResellerOptionDelete'])->name('reseller.option.delete');
    Route::get('reseller-faq',[App\Http\Controllers\Backend\HeaderController::class,'ResellerFAQ'])->name('reseller.faq');
    Route::get('reseller-add-faq',[App\Http\Controllers\Backend\HeaderController::class,'ResellerAddFAQ'])->name('reseller.add.faq');
    Route::get('delete-faq/{id}',[App\Http\Controllers\Backend\DashboardController::class,'deleteFaq'])->name('delete.faq');
    Route::get('web-hosting-header',[App\Http\Controllers\Backend\DashboardController::class,'WebHostingHeader'])->name('web.hosting.header');
    Route::get('web-hosting-options',[App\Http\Controllers\Backend\DashboardController::class,'WebHostingOptions'])->name('web.hosting.options');
    Route::get('web-hosting-add-option',[App\Http\Controllers\Backend\DashboardController::class,'WebHostingAddOption'])->name('web.hosting.add.option');
    Route::get('web-hosting-delete-option/{id}',[App\Http\Controllers\Backend\DashboardController::class,'WebHostingDeleteOption'])->name('web.hosting.delete.option');
    Route::get('web-hosting-features-option',[App\Http\Controllers\Backend\DashboardController::class,'WebHostingFeatureOption'])->name('web.hosting.features.option');
    Route::get('dedicated-server-header',[App\Http\Controllers\Backend\DashboardController::class,'DedicatedServerHeader'])->name('dedicated.server.header');
    Route::get('dedicated-server-feature',[App\Http\Controllers\Backend\DashboardController::class,'DedicatedServerFeature'])->name('dedicated.server.feature');
    Route::get('vps-server',[App\Http\Controllers\Backend\DashboardController::class,'VPSServer'])->name('admin.vps.server');
    Route::get('students',[App\Http\Controllers\Backend\StudentController::class,'Students'])->name('students');
    Route::get('student/{id}',[App\Http\Controllers\Backend\StudentController::class,'Delete'])->name('student.delete');
    Route::get('edit-student/{id}',[App\Http\Controllers\Backend\StudentController::class,'Edit'])->name('student.edit');
    Route::post('update-student/{id}',[App\Http\Controllers\Backend\StudentController::class,'Update'])->name('student.update');
    Route::get('payment-details/{id}',[App\Http\Controllers\Backend\StudentController::class,'PaymentDetails'])->name('payment.details');
    Route::get('pay/{id}',[App\Http\Controllers\Backend\StudentController::class,'Pay'])->name('pay');
    Route::get('one-time-pay/{id}',[App\Http\Controllers\Backend\StudentController::class,'OneTimePayment'])->name('one.time.pay');
    Route::post('one-time-pay-bill',[App\Http\Controllers\Backend\StudentController::class,'OneTimePaymentStore'])->name('one.time.pay.bill');
    Route::post('pay-store/{id}',[App\Http\Controllers\Backend\StudentController::class,'PayStore'])->name('pay.store');
    Route::get('payment-invoice/{id}',[App\Http\Controllers\Backend\StudentController::class,'PaymentInvoice'])->name('payment.invoice');
    Route::get('pages',[App\Http\Controllers\Backend\PageController::class,'Index'])->name('pages');
    Route::get('add-page',[App\Http\Controllers\Backend\PageController::class,'Add'])->name('add.page');
    Route::get('edit-page/{id}',[App\Http\Controllers\Backend\PageController::class,'Edit'])->name('edit.page');
    Route::get('delete-page/{id}',[App\Http\Controllers\Backend\PageController::class,'Delete'])->name('delete.page');
    Route::post('store-page',[App\Http\Controllers\Backend\PageController::class,'Store'])->name('store.page');
    Route::post('update-page/{id}',[App\Http\Controllers\Backend\PageController::class,'Update'])->name('update.page');
    Route::get('blogs',[App\Http\Controllers\Backend\PageController::class,'Blog'])->name('admin.blog');
    Route::get('add-blog',[App\Http\Controllers\Backend\PageController::class,'AddBlog'])->name('add.blog');
    Route::post('store-blog',[App\Http\Controllers\Backend\PageController::class,'StoreBlog'])->name('store.blog');
    Route::get('edit-blog/{id}',[App\Http\Controllers\Backend\PageController::class,'EditBlog'])->name('edit.blog');
    Route::get('delete-blog/{id}',[App\Http\Controllers\Backend\PageController::class,'BlogDelete'])->name('delete.blog');
    Route::post('update-blog/{id}',[App\Http\Controllers\Backend\PageController::class,'UpdateBlog'])->name('update.blog');
    Route::get('comments',[App\Http\Controllers\Backend\PageController::class,'Comments'])->name('comments');
    Route::post('comment-status',[App\Http\Controllers\Backend\PageController::class,'CommentStatus'])->name('comment.status');
});
Route::get('page/{slug}',[App\Http\Controllers\Frontend\HomeController::class,'Page'])->name('frontend.page');
