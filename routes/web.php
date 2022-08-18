<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientTypeController;
use App\Http\Controllers\clientInfoController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceClearance;
use App\Http\Controllers\hostingProviderController;
use App\Http\Controllers\domainRegistarController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\DomainAndHostingController;


Route::get('/', [dashboardController::class,'show'])->name('admin.dashboard')->middleware('auth');
Route::get('/date',function(){
    return view('date_time');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->prefix('/admin')->group(function () {

    // client type
    Route::get('/', [clientTypeController::class,'show'])->name('show_client_type');
    Route::get('/show_client_type', [clientTypeController::class,'show'])->name('show_client_type');
    Route::post('/insert_client_type', [clientTypeController::class,'insert'])->name('insert_client_type');
    Route::get('/update_page_client_type/{id}', [clientTypeController::class,'update_page']);
    Route::put('/update_client_type/{id}', [clientTypeController::class,'update']);

    // Hosting Provider
    Route::get('/hosting_provider', [hostingProviderController::class,'show'])->name('admin.hostingProvider');
    Route::post('/insert_hosting_provider', [hostingProviderController::class,'insert'])->name('admin.insertHostingProvider');
    Route::post('/update_hosting_provider', [hostingProviderController::class,'update'])->name('admin.updateHostingProvider');

    // Domain Registar
    Route::get('/show_domain_registar', [domainRegistarController::class,'show'])->name('admin.showDomainRegistar');
    Route::post('/insert_domain_registar', [domainRegistarController::class,'insert'])->name('admin.insertDomainRegistar');
    Route::post('/update_domain_registar', [domainRegistarController::class,'update'])->name('admin.updateDomainRegistar');


    // Client Information
    Route::get('/show_client_info', [clientInfoController::class,'show'])->name('admin.show_client_info')->middleware('auth');
    Route::post('/insert_client_info', [clientInfoController::class,'insert']);
    Route::put('/update_client_info', [clientInfoController::class,'update']);

    // Route::put('/update_client_info/{id}', [clientInfoController::class,'update']);
    Route::delete('/delete/{model}/{id}', [delete::class,'deletes']);
    Route::get('/client_info_ajax/{id}', [ProjectController::class,'ajax']);
    Route::get('/update_page_invoice_info/client_info_ajax/{id}', [ProjectController::class,'ajax']);

    // Project Information
    // admin.domainAndProject.insert
    Route::post('/insert_project_info', [ProjectController::class,'insert']);
    Route::post('/insert_domainAndHosting_info', [DomainAndHostingController::class,'insert'])->name("admin.domainAndProject.insert");
    Route::get('/show_project_info', [ProjectController::class,'show'])->name('admin.show_project_info');
    // Route::get('/show_domain_info', [ProjectController::class,'show_domain'])->name('admin.show_domain_info');
    // Route::get('/show_hosting_info', [ProjectController::class,'show_hosting'])->name('admin.show_hosting_info');
    // Route::get('/show_other_project_info', [ProjectController::class,'show_other_project']);
    Route::put('/update_project_info', [ProjectController::class,'update']);



    // Invoice Information
    Route::get('/show_invoice_info', [InvoiceController::class,'show'])->name('admin.invoiceShow');
    Route::get('/project_info_ajax/{id}', [InvoiceController::class,'ajax']);
    Route::get('/update_page_invoice_info/project_info_ajax/{id}', [InvoiceController::class,'ajax']);
    Route::POST('/insert_invoice_info', [InvoiceController::class,'insert']);
    Route::get('/update_page_invoice_info/{id}', [InvoiceController::class,'update_page_show'])->name('invoice.updatePage');
    Route::PUT('/update_invoice_info', [InvoiceController::class,'update'])->name('invoice.update');

    // Invoice Clearance
    Route::get('/show_invoice_pending_info', [InvoiceClearance::class,'show'])->name('clearance.show');
    Route::POST('/filter_invoice_pending_info', [InvoiceClearance::class,'filter'])->name('clearance.filter');
    Route::POST('/invoice_status_change', [InvoiceClearance::class,'statusChange'])->name('invoice.statusChange');

    // Invoice Pending List
    Route::get('/invoice_pending_list', [InvoiceClearance::class,'pendingList'])->name('invoice.pendingList');

    // Invoice Pending List
    Route::get('/invoice_paid_list', [InvoiceClearance::class,'paidList'])->name('invoice.paidList');

    // Delete Route
    Route::delete('/delete/{model}/{id}', [deleteController::class,'deletes'])->name('admin.delete');
    // Route::post('/delete', [deleteController::class,'psudoDelete'])->name('admin.psudoDelete');




});

