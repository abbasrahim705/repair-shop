<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientapiController extends Controller
{
    //
    public function indexapi(){
        $clients = User::all();
    return response()->json([
        'clients' => $clients
    ]);
        
    }
    public function createclient(Request $request){
        $client = User::create($request->all());

    return response()->json([
        'message' => "Product saved successfully!",
        'client' => $client
    ], 200);

    }
    public function updateclient(Request $request){
        
        $client=User::find($request->id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = $request->password;
        $client->address = $request->address;
        $client->status = $request->status;
        $client->phone = $request->phone;
        $message=$client->save();
        if ($message){
            return response()->json([
                'message' => "Product updated successfully!",
                'client' => $client
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => "Product updated successfully!"]);

        }
        

    }
    function searchclient($name){
        return User::Where("name".$name)->get();
    }
    public function deleteclient(User $product)
    {
    $product->delete();

    return response()->json([
        'message' => "Product deleted successfully!",
    ], 200);
}
        
        
    
}
