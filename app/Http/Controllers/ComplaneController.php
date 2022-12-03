<?php

namespace App\Http\Controllers;

use App\Models\Complane;
use Illuminate\Http\Request;

class ComplaneController extends Controller
{
    public function createcomplane(Request $request){
        $request->validate([
            "name" =>"required",
            "email" =>"required",
            "phone" =>"required",
            "complain" =>"required",
           

        ]);
        
        $item = Complane::create($request->all());

    return response()->json([
        'message' => "complanes saved successfully!",
        'Items' => $item
    ], 200);
}
}
