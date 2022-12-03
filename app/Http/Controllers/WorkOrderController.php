<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Technician;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function index(){
        return view('admin.workOrders.work-orders',[
            'orders' => WorkOrder::all(),
            'setting' => Setting::first(),
            'technicians' => Technician::all(),
        ]);


    }

    public function show(){
        return view('clients.new-work',[
            'items' => Item::all(),
            'services' => Service::all()
        ]);
    }

    public function store($id){
        $service = Service::find($id);
        $atrributes['service_id'] = $service->id;
        $atrributes['balance'] = $service->amount;
        $atrributes['client_id'] = auth()->user()->id;
        // $atrributes['item_id'] =1;
        // $atrributes['assigned_to'] =2;
        // dd($atrributes);
        // dd(WorkOrder::create($atrributes));
        WorkOrder::create($atrributes);
        return redirect(route('workOrders'))->with('success','Work order is placed');
    }

    public function payFee($id){
        $order = WorkOrder::find($id);
        // $order = WorkOrder::where('id',$id)->balance;
        // dd($order);
        WorkOrder::where('id',$id)->update([
            'payment_status' => 'paid',
            'net_balance' =>  $order->balance
        ]);

        return redirect(route('workOrders'))->with("success",'You have succesfully paid your fee');
    }

    public function assignTo($id){
        WorkOrder::where('id',$id)->update([
            'assigned_to' => request('assigned_to')
        ]);
        return redirect(route('workOrders'))->with('success','Work has been assigned');
    }

    public function processWork($id){
        $order = WorkOrder::where('id',$id)->first();
        // dd($order);
        if($order->assigned_to == null)
        {
            return redirect(route('workOrders'))->with('failed','Please Assign work first');
        }
        elseif($order->payment_status == 'pending')
        {
            return redirect(route('workOrders'))->with('failed','Can not procedd work unless payment is done');
        }
        elseif(($order->assigned_to != null) && ($order->payment_status != 'pending'))
        {
            WorkOrder::where('id',$id)->update([
                'work_status' => 'completed'
            ]);
            return redirect(route('workOrders'))->with('success','Work has been completed');
        }



    }

}
