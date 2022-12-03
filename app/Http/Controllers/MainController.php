<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Message;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Itemcategory(){
        return view('admin.item-category',[
            'categories' => Category::all()
        ]);
    }
    public function homepage(){
        return view("admin.home");
    }
    public function admindashboard(){
        return view("index");
    }


    //client
    public function Homeindex(){
        return view("home.1index",[
            'setting' => Setting::first(),
            'services' => Service::all()
        ]);
    }
    public function Serviceindex(){
        return view("home.services",[
            'setting' => Setting::first(),
            'services' => Service::all(),
            'features' => Feature::all(),

        ]);
    }
    public function Portfolioindex(){
        return view("home.portfolio",[
            'setting' => Setting::first()
        ]);
    }
    public function Contactindex(){
        return view("home.contact",[
            'setting' => Setting::first()
        ]);
    }

    //post the contect
    public function storemessage(Request $request){

        if($request->isMethod("POST")){
            $request->validate([
                "name"=>"required",
                "email"=>"required",
                "subject"=>"required",
                "message"=>"required",
            ]);
        }
        $messages = new Message();
        $messages->name = $request->name;
        $messages->email = $request->email;
        $messages->subject = $request->subject;
        $messages->message=$request->message;
        $messages->save();
        session()->flash("success","Your Message Has Been Sent");
        return redirect("Contact-index");
    }

}
