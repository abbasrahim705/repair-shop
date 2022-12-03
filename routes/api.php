<?php

use App\Http\Controllers\CategoriesApiController;
use App\Http\Controllers\ClientsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemApiController;
use App\Http\Controllers\UserapiController;
use App\Http\Controllers\ComplaneController;
use App\Http\Controllers\DashboardApiController;
use App\Http\Controllers\HomePageApiController;
use App\Http\Controllers\ServicesApiController;
use App\Http\Controllers\SettingApiController;
use App\Http\Controllers\TechniciansApiController;
use App\Http\Controllers\UsersApiController;
use App\Http\Controllers\WorkOrdersApiController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/items',[ItemApiController::class,'index']);

Route::middleware('auth:api')->prefix('v1')->group(function(){
    Route::get('/user',function(Request $request){
        return $request->user();
    });

    // Dashboard API Route
    Route::get('admin-dashboard',[DashboardApiController::class,'index']);

    // Item API Routes
    Route::get('/items',[ItemApiController::class,'index']);
    Route::get('/items/{item}',[ItemApiController::class,'show']);
    Route::post('/add-item',[ItemApiController::class,'store']);
    Route::post('/edit-item',[ItemApiController::class,'edit']);
    Route::put('/updating-item/{item}',[ItemApiController::class,'update']);
    Route::delete('/deleting-item/{item}',[ItemApiController::class,'destroy']);

    // Technician API Routes
    Route::get('/technicians',[TechniciansApiController::class,'index']);
    Route::get('/technicians/{technician}',[TechniciansApiController::class,'show']);
    Route::post('/add-technician',[TechniciansApiController::class,'store']);
    Route::post('/edit-technician',[TechniciansApiController::class,'edit']);
    Route::put('/updating-technician/{technician}',[TechniciansApiController::class,'update']);
    Route::delete('/deleting-technician/{technician}',[TechniciansApiController::class,'destroy']);

    // Category API Routes
    Route::get('/categories',[CategoriesApiController::class,'index']);
    Route::get('/categories/{category}',[CategoriesApiController::class,'show']);
    Route::post('/add-category',[CategoriesApiController::class,'store']);
    Route::post('/edit-category',[CategoriesApiController::class,'edit']);
    Route::put('/updating-category/{category}',[CategoriesApiController::class,'update']);
    Route::delete('/deleting-category/{category}',[CategoriesApiController::class,'destroy']);

    // Client API Routes
    Route::get('/clients',[ClientsApiController::class,'index']);
    Route::get('/clients/{client}',[ClientsApiController::class,'show']);
    Route::post('/add-client',[ClientsApiController::class,'store']);
    Route::post('/edit-client',[ClientsApiController::class,'edit']);
    Route::put('/updating-client/{client}',[ClientsApiController::class,'update']);
    Route::delete('/deleting-client/{client}',[ClientsApiController::class,'destroy']);

    // Service API Routes
    Route::get('/services',[ServicesApiController::class,'index']);
    Route::get('/services/{service}',[ServicesApiController::class,'show']);
    Route::post('/add-service',[ServicesApiController::class,'store']);
    Route::post('/edit-service',[ServicesApiController::class,'edit']);
    Route::put('/updating-service/{service}',[ServicesApiController::class,'update']);
    Route::delete('/deleting-service/{service}',[ServicesApiController::class,'destroy']);

    // Setting API Routes
    Route::get('/settings',[SettingApiController::class,'index']);
    // Route::get('/services/{service}',[SettingApiController::class,'show']);
    // Route::post('/add-service',[SettingApiController::class,'store']);
    Route::post('/edit-setting',[SettingApiController::class,'edit']);
    Route::put('/updating-setting/{setting}',[SettingApiController::class,'update']);
    Route::delete('/deleting-service/{service}',[SettingApiController::class,'destroy']);

    // WorkOrder API Routes
    Route::get('/work-orders',[WorkOrdersApiController::class,'index']);
    Route::get('/work-orders/{workOrder}',[WorkOrdersApiController::class,'show']);
    Route::post('/add-workOrder',[WorkOrdersApiController::class,'store']);
    Route::post('/edit-workOrder',[WorkOrdersApiController::class,'edit']);
    Route::put('/updating-workOrder/{workOrder}',[WorkOrdersApiController::class,'update']);
    Route::delete('/deleting-workOrder/{workOrder}',[WorkOrdersApiController::class,'destroy']);

});
// Route::middleware('auth:api')->prefix('v1')->group(function(){
//     Route::get('/home',[HomePageApiController::class,'index']);
//     Route::get('/services',[HomePageApiController::class,'services']);
//     Route::get('/portpolio',[HomePageApiController::class,'portfolio']);
//     Route::get('/contact',[HomePageApiController::class,'contact']);

// });
// sample API

// Route::get('/testing', function(Request $request){
//     return 'testing';
// });

// // user routes api
// Route::get("show-clients",[UserapiController::class, "indexapi"]);
// Route::post("create-client",[UserapiController::class, "createclient"]);
// Route::put("update-client/{id}",[UserapiController::class, "updateclient"]);
// Route::get("search-client/{name}",[UserapiController::class, "searchclient"]);
// Route::delete("delete-client/{id}",[UserapiController::class, "deleteclient"]);
// Route::get("show-clients/{id}",[UserapiController::class, "showapi"]);

// // items routs api
// Route::get("show-items",[ItemApiController::class, "indexapi"]);
// Route::post("create-item",[ItemApiController::class, "createitem"]);
// Route::put("update-item/{id}",[ItemApiController::class, "updateitem"]);
// Route::get("search-item/{name}",[ItemApiController::class, "searchitem"]);
// Route::delete("delete-item/{id}",[ItemApiController::class, "deleteitem"]);
// Route::get("search-item/{id}",[ItemApiController::class, "showapi"]);

// //Complane route api
// Route::post("complane-save",[ComplaneController::class, "createcomplane"]);

