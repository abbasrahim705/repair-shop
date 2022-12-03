<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('admin.site-settings.setting',[
            'setting' => Setting::first()
        ]);
    }

    public function store(Request $request){
        // dd(request()->all());
        $atrributes = request()->validate([
            'shop_name' => 'required',
            'shop_slogan' => 'required|min:5|max:50',
            'owner_name' => 'required|min:3|max:20',
            'logo' => 'nullable|image',
            'address' => 'required|min:3|max:100',
            'email' => 'required|email',
            'contact_no' => 'required|min:11|max:14',
            'web_address' => 'required',
            'facebook' => 'required',
            'whatsapp' => 'required|min:11|max:14',
            'youtube' => 'required',
            'linkedin' => 'required',
            'tiktok' => 'required',
            'instagram' => 'required'
        ]);


        $atrributes['edited_by'] = auth()->user()->id;
        if(request()->has('logo')){
            $attributes['logo'] = $request->file('logo')->store('public/images');
        }
        // dd($atrributes);
        Setting::updateOrCreate(['id' => 1],$atrributes);
        return redirect(route('settings'))->with('success','Setting Updated Successfully');
    }
}
