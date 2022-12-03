<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkOrderController;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Setting;
use App\Models\WorkOrder;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';

Route::middleware('auth','admin')->group(function(){
    //admin
//admin dashboard
Route::get('admin-dashboard', [AdminController::class, "index"])->name('admin-dashboard');

//technicians
Route::get("technicians", [TechnicianController::class, "index"])->name('technicians-list');
Route::post("adding-technician",[TechnicianController::class, "store"])->name('adding-tech');
Route::get("edid-tech/{id}",[TechnicianController::class, "edit"])->name('editing-technician');
Route::post("update-tech",[TechnicianController::class, "update"])->name('updating-technician');
Route::get("delete-tech/{id}",[TechnicianController::class, "destroy"])->name('deleting-technician');

//clients
Route::get("client-list",[UserController::class, "index"])->name('clients_list');
Route::get("delete-client/{id}",[UserController::class, "destroy"])->name('delete-client');
Route::get("edid-client/{id}",[UserController::class, "create"])->name('edit_client');
Route::post("update-client",[UserController::class, "update"])->name('update-client');

//services
Route::get("servicelist",[ServiceController::class, "index"])->name('service-list');
Route::post("servicepost",[ServiceController::class, "store"])->name('adding-service');
Route::patch('update-service',[ServiceController::class,'update'])->name('updating-service');
Route::get('edit-service/{id}',[ServiceController::class,'edit'])->name('edit_service');
Route::get('delete-service/{id}',[ServiceController::class,'destroy'])->name('delete_service');
Route::post('/get-service/{id}',[WorkOrderController::class,'store'])->name('get-serivce');
Route::patch('/pay-fee/{id}',[WorkOrderController::class,'payFee'])->name('pay-fee');


// items
Route::get("item-list",[ItemController::class, "index"])->name('item-list');
Route::post("add-item",[ItemController::class, "store"])->name('adding-item');
Route::get("edit-item/{id}",[ItemController::class, "edit"])->name('edit-item');
Route::post("updated-item",[ItemController::class, "update"])->name('update-item');
Route::get("delete-item/{id}",[ItemController::class, "destroy"])->name('delete-item');
Route::get('/items',[ItemController::class,'items'])->name('items');
Route::post('/get-item/{id}',[ItemController::class,'getItem'])->name('get-item');
Route::get('items-bought',[ItemController::class,'itemsBought'])->name('ItemsBought');

// Categories in here
Route::get('item-category',[CategoryController::class,'index'])->name('item-category');
Route::get('edit-category/{id}',[CategoryController::class,'create'])->name('edit-category');
Route::patch('updating-category',[CategoryController::class,'update'])->name('updating-category');
Route::post('adding-category',[CategoryController::class,'store'])->name('adding-category');
Route::get('delete_category/{id}',[CategoryController::class,'destroy'])->name('delete_category');

// work orders in here
Route::get('/work-orders',[WorkOrderController::class,'index'])->name('workOrders');
// Route::get('/newwork',[WorkOrderController::class,'show'])->name('show-orders');
Route::patch('/process-work/{id}',[WorkOrderController::class,'processWork'])->name('process-work');
Route::patch('/assign-to-tech/{id}',[WorkOrderController::class,'assignTo'])->name('assignTo');

//  Site Settings in here
Route::get('/settings',[SettingController::class,'index'])->name('settings');
Route::patch('/update_settings',[SettingController::class,'store'])->name('update-setting');
});




// guest mode
Route::get("/",[MainController::class, "Homeindex"])->name('home');
Route::get("services",[MainController::class, "Serviceindex"])->name('services');
Route::get("portfolio",[MainController::class, "Portfolioindex"])->name('portfolio');
Route::get("contact",[MainController::class, "Contactindex"])->name('contact');

Route::post("send-all",[MainController::class, "storemessage"])->name('store-message');

// Features in here
Route::get('features',[FeatureController::class,'index'])->name('features');
Route::post('adding-feature',[FeatureController::class,'store'])->name('adding-feature');
Route::get('editing-feature',[FeatureController::class,'create'])->name('editing-feature');
Route::patch('/updating-feature',[FeatureController::class,'update'])->name('updating-feature');
Route::get('deleting-feature/{id}',[FeatureController::class,'destroy'])->name('deleting-feature');

//SMT
// Route::get("send-mail",[SimpleController::class, "SendMail"]);
// Route::get("send-mail-show",[SimpleController::class, "sendformshow"]);
// Route::post("send-all",[SimpleController::class, "send"])->name('send.mail');


Route::get("/workstatus", function(){
    return view("clients.work-status");
})->name('work-status');


Route::get("/1index", function(){
    return view("home.1index");
});

Route::get("/customerwork", function(){
    return view("customer-work-order");
});


