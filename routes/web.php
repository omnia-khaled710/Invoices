<?php

use App\Http\Controllers\CustomerReportController;
use App\Http\Controllers\invoiceReportController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\InvoiceAchiveController;
use Illuminate\Routing\RouteCollection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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
Route::middleware(['auth'])->group(function () {
    // Route::resource('invoices', InvoicesController::class);
    // Route::get('/InvoicesDetails/{id}',[InvoicesDetailsController::class,'edit']);
});

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/notification', function () {
//     $notifications=auth()->user()->unreadNotifications;
//     return $notifications;
// });

Auth::routes();
//Auth::routes(['register'=> false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::resource('invoices', InvoicesController::class);
Route::resource('sections', SectionsController::class);
Route::resource('products', ProductsController::class);
//TO GET PRODUCT IN SECTION WHEN SELECT THE SECTION IN INVOICE FORM
Route::get('/section/{id}',[InvoicesController::class,'getproducts']);
//file
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'get_file']);
Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'open_file']);
Route::post('delete_file', [InvoicesDetailsController::class, 'destroy'])->name('delete_file');
///////////
Route::resource('InvoiceAttachments', InvoicesAttachmentsController::class);
Route::get('/edit_invoice/{id}',[InvoicesController::class,'edit']);
///////////
Route::get('/Status_show/{id}', [InvoicesController::class,'show'])->name('status_show');
Route::post('/Status_Update/{id}', [InvoicesController::class,'Status_Update'])->name('Status_Update');
//////////
Route::get('Invoice_Paid',[InvoicesController::class,'Invoice_Paid']);
Route::get('Invoice_UnPaid',[InvoicesController::class,'Invoice_UnPaid']);
Route::get('Invoice_Partial',[InvoicesController::class,'Invoice_Partial']);
Route::get('Invoice_Print/{id}',[InvoicesController::class,'Invoice_Print']);
///////////InvoicesADetails
Route::resource('Archive', InvoiceAchiveController::class);
Route::get('/InvoicesDetails/{id}',[InvoicesDetailsController::class,'edit']);
///////////////
Route::get('/ArchivedInvoicesDetails/{id}',[InvoicesDetailsController::class,'edit1']);
///////////////
Route::get('export_invoices', [InvoicesController::class, 'export']);
//////////////////////////
Route::group(['middleware' => ['auth']], function() {
Route::resource('roles',RoleController::class);
Route::resource('users',UserController::class);
    Route::get('Customers_report', [CustomerReportController::class,'index']);
    Route::post('Search_customers', [CustomerReportController::class,'Search_customers']);
    Route::get('/MarkReadAll', [InvoicesController::class, 'MarkReadAll'])->name('MarkReadAll');
    Route::get( '/readNotification/{ID}', [InvoicesController::class, 'readNotification']);
});
//////////////////////////////////////
Route::get('invoices_report', [invoiceReportController::class,'index']);

Route::post('Search_invoices', [invoiceReportController::class,'Search_invoices']);
/////////////////////////////////////////////////
Route::get('/{page}', [AdminController::class,'index']);