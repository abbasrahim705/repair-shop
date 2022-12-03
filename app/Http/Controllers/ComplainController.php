<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    //complain box
    public function complainbox(){
        return view("clients.complaine");
    }
    public function storecomplain(Request $request){

        if($request->isMethod("POST")){
            $request->validate([
                "name"=>"required",
                "email"=>"required",
                "phone"=>"required",
                "complain"=>"required",
            ]);
        }
        $complains = new Complain();
        $complains->name = $request->name;
        $complains->email = $request->email;
        $complains->phone = $request->phone;
        $complains->complain=$request->complain;
        $complains->save();
        session()->flash("success","the complaint has been added");
        return redirect("clientdashboard");
    }
}
