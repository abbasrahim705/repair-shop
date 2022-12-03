<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        return view('clients.clients', [
            "clientsall" =>  User::where('role','3')->get(),
            'setting' => Setting::first()
        ]);
    }

    public function create($id){
       return view('clients.client-update', [
        'client' => User::find($id)
    ]);
    }

    //updtate
    public function update(Request $request){
        $atrributes = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'status' => 'required',
            'password' => 'required',
            'address' => 'required',
            'image' => 'nullable|image',
            'role' => 'nullable'
        ]);
        $atrributes['id'] = request('id');
        if ($image = $request->file('image')) {
            // $destinationPath = 'images/item/';
            $atrributes['image'] = request()->file('image')->store('public/images');
            // $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // $image->move($destinationPath, $profileImage);
            // $attributes['image'] = "$profileImage";
        }
        // if($request->has('image')){
        //     $atrributes['image'] = $request->file('image')->store('images');

        // }
        User::where('id',$atrributes['id'])->update($atrributes);
        return redirect(route('clients_list'))->with('success','Client Updated');
        // $clients = User::find($request['client_id']);
        // $clients->name = $request["name"];
        // $clients->email = $request["email"];
        // $clients->address = $request["address"];
        // $clients->status = $request["status"];
        // $clients->phone = $request["phone"];
        // $clients->password = $request["password"];
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'images/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $client['image'] = "$profileImage";
        // } else {
        //     unset($clients['image']);
        // }
        // $clients->save();
        // session()->flash("success", "The form has been Updated successfully");
        // return redirect("client-list");
    }
    //delete method
    public function destroy($client_id){
        $client = User::find($client_id);
        $client->delete();
        session()->flash("success", "The form has been deleted successfully");
        return redirect("client-list");

    }





}
