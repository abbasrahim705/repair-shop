<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkOrdersResource;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrdersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WorkOrdersResource::collection(WorkOrder::all());
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
        $workOrder = WorkOrder::create([
            'client_id' => $request->input('client_id'),
            'service_id' => $request->input('service_id'),
            'work_status' => $request->input('work_status'),
            'payment_status' => $request->input('payment_status'),
        ]);
        return new WorkOrdersResource($workOrder);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrder $workOrder)
    {
        return new WorkOrdersResource($workOrder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrder $workOrder)
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
    public function update(Request $request, WorkOrder $workOrder)
    {
        $workOrder->update([
            'client_id' => $request->input('client_id'),
            'service_id' => $request->input('service_id'),
            'work_status' => $request->input('work_status'),
            'payment_status' => $request->input('payment_status'),
        ]);
        return new WorkOrdersResource($workOrder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrder $workOrder)
    {
        $workOrder->delete();
        return response('Work has been deleted');
    }
}
