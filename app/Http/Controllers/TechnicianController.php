<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{

    public function store(Request $request){
        if($request->isMethod("POST")){
            $request->validate([
                "name"=>"required",
                "email"=>"required",
                "address"=>"required",
                "status"=>"required",
                "phone"=>"required",
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
        }
        $tech = new Technician();
        $tech->name = $request->name;
        $tech->email = $request->email;
        $tech->address = $request->address;
        $tech->status = $request->status;
        $tech->phone = $request->phone;
        $tech->created_id = auth()->user()->id;
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $tech['image'] = "$profileImage";
        }
        $tech->save();
        return redirect(route('technicians-list'))->with('success','Technician Added Successfully');
    }
    public function index(){
        return view("technician.technician-list", [
            "technicianall" => Technician::all(),
            'setting' => Setting::first()
        ]);
    }

    public function edit($id){
       return view("technician.tech-update",[
        'technicians' => Technician::find($id)
        ]);
    }
    public function update(Request $request,){
        $tech = Technician::find($request['technicians_id']);
        $tech->name = $request['name'];
        $tech->email = $request['email'];
        $tech->phone = $request['phone'];
        // $tech->registration = $request['registration'];
        $tech->status = $request['status'];
        // $tech->experience = $request['experience'];
        $tech->created_id = auth()->user()->id;
        $tech->address = $request['address'];
        // if(request()->image){
        //     $tech->image = $request->file('image')->store('public/images');
        // }
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $technicians['image'] = "$profileImage";
        } else {
            unset($tech['image']);
        }
        $tech->save();
        return redirect(route('technicians-list'))->with('success','Technician Updated Successfully');
    }
    public function destroy($id){
        $tech = Technician::find($id);
        $tech->delete();
        return redirect(route('technicians-list'))->with('success','Technician Deleted Successfully');

    }
}
