<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingsResource;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SettingsResource(Setting::first());
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
        $setting = Setting::create([
            'shop_name' => $request->input('shop_name'),
            'shop_slogan' => $request->input('shop_slogan'),
            'logo' => $request->input('logo'),
            'owner_name' => $request->input('owner_name'),
            'address' => $request->input('address'),
            'map_address' => $request->input('map_address'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'web_address' => $request->input('web_address'),
            'facebook' => $request->input('facebook'),
            'whatsapp' => $request->input('whatsapp'),
            'instagram' => $request->input('instagram'),
            'youtube' => $request->input('youtube'),
            'linkedin' => $request->input('linkedin'),
            'tiktok' => $request->input('tiktok'),
            'edited_by' => $request->input('edited_by'),
        ]);

        return new SettingsResource($setting);
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
    public function update(Request $request, Setting $setting)
    {
        $setting->update([
            'shop_name' => $request->input('shop_name'),
            'shop_slogan' => $request->input('shop_slogan'),
            'logo' => $request->input('logo'),
            'owner_name' => $request->input('owner_name'),
            'address' => $request->input('address'),
            'map_address' => $request->input('map_address'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'web_address' => $request->input('web_address'),
            'facebook' => $request->input('facebook'),
            'whatsapp' => $request->input('whatsapp'),
            'instagram' => $request->input('instagram'),
            'youtube' => $request->input('youtube'),
            'linkedin' => $request->input('linkedin'),
            'tiktok' => $request->input('tiktok'),
            'edited_by' => $request->input('edited_by'),
        ]);

        return new SettingsResource($setting);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return response('Setting has been deleted');
    }
}
