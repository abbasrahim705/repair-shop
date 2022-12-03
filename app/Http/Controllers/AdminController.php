<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Technician;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        return view('index',[
            'users' => User::Where('role','3')->count(),
            'technicians' => Technician::count(),
            'orders' => WorkOrder::all(),
            'client_order' => WorkOrder::where('client_id',auth()->user()->id)->where('item_id',null),
            'client_item' => WorkOrder::where('client_id',auth()->user()->id)->where('service_id',null),
            'services' => Service::all(),
            'setting' => Setting::first(),
            'earnings' => WorkOrder::sum('net_balance'),
        ]);
    }
}
