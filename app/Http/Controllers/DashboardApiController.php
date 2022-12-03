<?php

namespace App\Http\Controllers;

use App\Http\Resources\DashboardResource;
use App\Http\Resources\User;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Technician;
use App\Models\User as ModelsUser;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class DashboardApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'clients' => \App\Models\User::where('role',3)->get()->count(),
            'technicians' => Technician::count(),
            'orders' => WorkOrder::all(),
            'client_order' => WorkOrder::where('client_id',auth()->user()->id)->where('item_id',null),
            'client_item' => WorkOrder::where('client_id',auth()->user()->id)->where('service_id',null),
            'services' => Service::all(),
            'setting' => Setting::first(),
            'earnings' => WorkOrder::sum('net_balance')
        ];


            return new DashboardResource($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
