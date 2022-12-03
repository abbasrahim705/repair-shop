<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UserRequest;

class UsersApiController extends Controller
{
    //
    public function indexapi(){
        $clients = User::all();

        return response()->json([
            'clients' => $clients
    ]);
}
    public function showapi($id){
        $clients = User::find($id);
         return response()->json([
            'clients' => $clients
        ], 200);

    }

    public function createclient(Request $request){
        $request->validate([
            "name" =>"required",
            "email" =>"required",
            "password" =>"required",
            "address" =>"required",
            "status" =>"required",
            "phone" =>"required",
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $image_path = $request->file('image')->store('image', 'public');

        $data = User::create([
            'image' => $image_path,
        ]);

        return response($data, Response::HTTP_CREATED);

        $client = User::create($request->all());

        return response()->json([
            'message' => "Client has been added successfully!",
            'client' => $client
         ], 200);

    }
    public function updateclient(Request $request, $id){
        $request->validate([
            "name" =>"required",
            "email" =>"required",
            "password" =>"required",
            "address" =>"required",
            "status" =>"required",
            "phone" =>"required",
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $client=User::find($id);
        if ($client){
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = $request->password;
        $image_path = $request->file('image')->store('image', 'public');

        $data = User::create([
            'image' => $image_path,
        ]);

        return response($data, Response::HTTP_CREATED);
        $client = User::create($request->all());

        $client->update();

            return response()->json([
                'message' => "Product updated successfully!",
                'client' => $client
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => "Product updated unsuccessfully!"],404);

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
public function Usersearch($id){
    $user = User::find($id);
    if(is_null($user)){
        return response()->json(['message'=>'User Not Found'], 400);

    }
    return response()->json($user::find($id),200);
}
}
