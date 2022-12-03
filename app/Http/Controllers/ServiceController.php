<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // public function createservice(){
    //     return view("service.service-form");
    // }
    public function store(){
        $attributes = request()->validate([
            'name' =>'required',
            'description' => 'required',
            'amount' =>'required'
        ]);

        $attributes['created_by'] = auth()->user()->id;
        Service::create($attributes);
        return redirect('servicelist')->with('success','Service Added Succesfully');
    }

    public function index(){
        return view("service.services-list", [
            "services"=>Service::all(),
            'setting' => Setting::first()
        ]);
    }

    public function edit($id){
        return view('service.service-form',[
            'service' => Service::find($id)
        ]);
    }

    public function update(){
        $attributes = request()->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required'
        ]);
        Service::where('id',$attributes['id'])->update($attributes);
        return redirect(route('service-list'))->with('success','Service Updated');
    }

    public function destroy($id){
        $service = Service::find($id);
        $service->delete();
        return redirect(route('service-list'))->with('success','Service Deleted Succesfully');
    }
}
