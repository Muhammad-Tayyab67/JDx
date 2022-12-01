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


Route::group(['middleware' => 'auth', 'prevent-back-history'], function () {

Route::get('/',[App\Http\Controllers\DashboardController::class, 'dashboard_1' ]);


Route::get('/logout',function(){
    Auth::logout();
    return redirect('/index');
});

Route::get('/index', 'App\Http\Controllers\OmahadminController@page_login');
Route::get('/page-login', 'App\Http\Controllers\OmahadminController@page_login');

//Route::get('/main_dashboard', 'App\Http\Controllers\OmahadminController@dashboard_1');
Route::get('/index', [App\Http\Controllers\DashboardController::class, 'dashboard_1' ]);
Route::get('/analytics', [App\Http\Controllers\DashboardController::class, 'analytics' ])->middleware('can:View Analytics');
//Route::get('/analytics', 'App\Http\Controllers\OmahadminController@analytics');
Route::get('/customer-list', 'App\Http\Controllers\OmahadminController@customer_list');
Route::get('/property-details', 'App\Http\Controllers\OmahadminController@property_details');

//User Routes
//Route::get('/user', 'App\Http\Controllers\OmahadminController@User');
Route::get('/user', [App\Http\Controllers\UserController::class, 'user'])->middleware('can:View User');
Route::get('/user/add',[App\Http\Controllers\UserController::class, 'User_Form'])->middleware('can:Add User');
Route::post('/user/store',[App\Http\Controllers\UserController::class, 'store']);
Route::get('user/edit/{id}',[App\Http\Controllers\UserController::class, 'User_Edit'])->middleware('can:Edit User');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::get('/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware('can:Delete User');


//Route::get('/useredit', 'App\Http\Controllers\OmahadminController@User_Edit');

//Role Routes
//Route::get('/roles', 'App\Http\Controllers\OmahadminController@roles');
Route::get('/roles', [App\Http\Controllers\RoleController::class, 'roles'])->middleware('can:View Role');
Route::post('/role/store', [App\Http\Controllers\RoleController::class, 'store']);
Route::get('/roles/add', [App\Http\Controllers\RoleController::class,'Roles_Form'])->middleware('can:Add Role');
Route::get('/roles/edit/{id}', [App\Http\Controllers\RoleController::class,'Roles_Edit'])->middleware('can:Edit Role');
Route::post('/role/update/{id}', [App\Http\Controllers\RoleController::class, 'update']);
Route::get('/role/destroy/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->middleware('can:Delete Role');

//Employee Routes
//Route::get('/employee_list', 'App\Http\Controllers\OmahadminController@Employee_LIST');
Route::get('/employee/add', [App\Http\Controllers\EmployeController::class,'Employee_FORM'])->middleware('can:Add Employee');
Route::get('/employees', [App\Http\Controllers\EmployeController::class,'Employee_LIST'])->middleware('can:View Employee');
Route::post('/employe/store', [App\Http\Controllers\EmployeController::class, 'store']);
Route::get('/employee/edit/{id}', [App\Http\Controllers\EmployeController::class, 'Employee_EDIT'])->middleware('can:Edit Employee');
Route::post('/employee/update/{id}', [App\Http\Controllers\EmployeController::class, 'update']);
Route::get('/employe/destroy/{id}', [App\Http\Controllers\EmployeController::class, 'destroy'])->middleware('can:Delete Employee');
//Route::get('/employee_edit', 'App\Http\Controllers\OmahadminController@Employee_EDIT');

//Scout Routes
//Route::get('/scout_list', 'App\Http\Controllers\OmahadminController@Scout_LIST');
Route::get('/scout/list', [App\Http\Controllers\ScoutController::class,'Scout_LIST'])->middleware('can:View Property');
Route::get('/scout/add', [App\Http\Controllers\ScoutController::class,'Scout_FORM'])->middleware('can:Add Property');
Route::post('/scout/store', [App\Http\Controllers\ScoutController::class, 'store']);
//Route::get('/scout_form', 'App\Http\Controllers\OmahadminController@Scout_FORM');
//Route::get('/scout_edit', 'App\Http\Controllers\OmahadminController@Scout_EDIT');
Route::get('scout/edit/{id}', [App\Http\Controllers\ScoutController::class, 'Scout_EDIT'])->middleware('can:Edit Property');
Route::post('scout/update/{id}', [App\Http\Controllers\ScoutController::class, 'update']);
Route::get('scout/destroy/{id}', [App\Http\Controllers\ScoutController::class, 'destroy'])->middleware('can:Delete Property');


//Route::get('/property_list/{id}', 'App\Http\Controllers\OmahadminController@Property_LIST');
Route::get('/property/list', [App\Http\Controllers\PropertyController::class,'Property_LIST'])->middleware('can:View Master Property');
Route::get('/property/edit/{id}', [App\Http\Controllers\PropertyController::class,'Property_EDIT'])->middleware('can:Edit Master Property');
// Route::get('/property_form', [App\Http\Controllers\PropertyController::class,'Property_FORM'])->middleware('can:Add Master Property');
//Route::get('/property_form', 'App\Http\Controllers\OmahadminController@Property_FORM')->middleware('Add Property');
Route::post('property/update/{id}', [App\Http\Controllers\PropertyController::class, 'update']);
Route::post('/export', [App\Http\Controllers\PropertyController::class, 'export'])->name('export')->middleware('can:Export Master Property');
Route::get('property/destroy/{id}', [App\Http\Controllers\PropertyController::class, 'destroy'])->middleware('can:Delete Master Property');

//Route::get('/property_edit', 'App\Http\Controllers\OmahadminController@Property_EDIT');

//Images Routes
Route::get('/property/files/list/{id}', [App\Http\Controllers\ImageController::class, 'Property_Files']);
Route::get('image/delete/{id}', [App\Http\Controllers\ImageController::class, 'delete']);
Route::get('image/download/{id}', [App\Http\Controllers\ImageController::class, 'download']);
Route::post('image/store/{id}', [App\Http\Controllers\ImageController::class, 'store']);


Route::get('/order-list', 'App\Http\Controllers\OmahadminController@order_list');
Route::get('/review', 'App\Http\Controllers\OmahadminController@review');
Route::get('/app-calender', 'App\Http\Controllers\OmahadminController@app_calender');
Route::get('/app-profile', 'App\Http\Controllers\OmahadminController@app_profile');
Route::get('/post-details', 'App\Http\Controllers\OmahadminController@post_details');
Route::get('/chart-chartist', 'App\Http\Controllers\OmahadminController@chart_chartist');
Route::get('/chart-chartjs', 'App\Http\Controllers\OmahadminController@chart_chartjs');
Route::get('/chart-flot', 'App\Http\Controllers\OmahadminController@chart_flot');
Route::get('/chart-morris', 'App\Http\Controllers\OmahadminController@chart_morris');
Route::get('/chart-peity', 'App\Http\Controllers\OmahadminController@chart_peity');
Route::get('/chart-sparkline', 'App\Http\Controllers\OmahadminController@chart_sparkline');
Route::get('/ecom-checkout', 'App\Http\Controllers\OmahadminController@ecom_checkout');
Route::get('/ecom-customers', 'App\Http\Controllers\OmahadminController@ecom_customers');
Route::get('/ecom-invoice', 'App\Http\Controllers\OmahadminController@ecom_invoice');
Route::get('/ecom-product-detail', 'App\Http\Controllers\OmahadminController@ecom_product_detail');
Route::get('/ecom-product-grid', 'App\Http\Controllers\OmahadminController@ecom_product_grid');
Route::get('/ecom-product-list', 'App\Http\Controllers\OmahadminController@ecom_product_list');
Route::get('/ecom-product-order', 'App\Http\Controllers\OmahadminController@ecom_product_order');
Route::get('/email-compose', 'App\Http\Controllers\OmahadminController@email_compose');
Route::get('/email-inbox', 'App\Http\Controllers\OmahadminController@email_inbox');
Route::get('/email-read', 'App\Http\Controllers\OmahadminController@email_read');
Route::get('/form-editor-summernote', 'App\Http\Controllers\OmahadminController@form_editor_summernote');
Route::get('/form-element', 'App\Http\Controllers\OmahadminController@form_element');
Route::get('/form-pickers', 'App\Http\Controllers\OmahadminController@form_pickers');
Route::get('/form-validation-jquery', 'App\Http\Controllers\OmahadminController@form_validation_jquery');
Route::get('/form-wizard', 'App\Http\Controllers\OmahadminController@form_wizard');
Route::get('/map-jqvmap', 'App\Http\Controllers\OmahadminController@map_jqvmap');
Route::get('/page-error-400', 'App\Http\Controllers\OmahadminController@page_error_400');
Route::get('/page-error-403', 'App\Http\Controllers\OmahadminController@page_error_403');
Route::get('/page-error-404', 'App\Http\Controllers\OmahadminController@page_error_404');
Route::get('/page-error-500', 'App\Http\Controllers\OmahadminController@page_error_500');
Route::get('/page-error-503', 'App\Http\Controllers\OmahadminController@page_error_503');
Route::get('/page-forgot-password', 'App\Http\Controllers\OmahadminController@page_forgot_password');
Route::get('/page-lock-screen', 'App\Http\Controllers\OmahadminController@page_lock_screen');

Route::get('/page-register', 'App\Http\Controllers\OmahadminController@page_register');
Route::get('/table-bootstrap-basic', 'App\Http\Controllers\OmahadminController@table_bootstrap_basic');
Route::get('/table-datatable-basic', 'App\Http\Controllers\OmahadminController@table_datatable_basic');
Route::get('/uc-lightgallery', 'App\Http\Controllers\OmahadminController@uc_lightgallery');
Route::get('/uc-nestable', 'App\Http\Controllers\OmahadminController@uc_nestable');
Route::get('/uc-noui-slider', 'App\Http\Controllers\OmahadminController@uc_noui_slider');
Route::get('/uc-select2', 'App\Http\Controllers\OmahadminController@uc_select2');
Route::get('/uc-sweetalert', 'App\Http\Controllers\OmahadminController@uc_sweetalert');
Route::get('/uc-toastr', 'App\Http\Controllers\OmahadminController@uc_toastr');
Route::get('/ui-accordion', 'App\Http\Controllers\OmahadminController@ui_accordion');
Route::get('/ui-alert', 'App\Http\Controllers\OmahadminController@ui_alert');
Route::get('/ui-badge', 'App\Http\Controllers\OmahadminController@ui_badge');
Route::get('/ui-button', 'App\Http\Controllers\OmahadminController@ui_button');
Route::get('/ui-button-group', 'App\Http\Controllers\OmahadminController@ui_button_group');
Route::get('/ui-card', 'App\Http\Controllers\OmahadminController@ui_card');
Route::get('/ui-carousel', 'App\Http\Controllers\OmahadminController@ui_carousel');
Route::get('/ui-dropdown', 'App\Http\Controllers\OmahadminController@ui_dropdown');
Route::get('/ui-grid', 'App\Http\Controllers\OmahadminController@ui_grid');
Route::get('/ui-list-group', 'App\Http\Controllers\OmahadminController@ui_list_group');
Route::get('/ui-media-object', 'App\Http\Controllers\OmahadminController@ui_media_object');
Route::get('/ui-modal', 'App\Http\Controllers\OmahadminController@ui_modal');
Route::get('/ui-pagination', 'App\Http\Controllers\OmahadminController@ui_pagination');
Route::get('/ui-popover', 'App\Http\Controllers\OmahadminController@ui_popover');
Route::get('/ui-progressbar', 'App\Http\Controllers\OmahadminController@ui_progressbar');
Route::get('/ui-tab', 'App\Http\Controllers\OmahadminController@ui_tab');
Route::get('/ui-typography', 'App\Http\Controllers\OmahadminController@ui_typography');
Route::get('/widget-basic', 'App\Http\Controllers\OmahadminController@widget_basic');

});