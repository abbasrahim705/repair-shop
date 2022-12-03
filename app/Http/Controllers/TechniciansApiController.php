<?php

namespace App\Http\Controllers;

use App\Http\Resources\TechniciansResource;
use App\Models\Technician;
use Illuminate\Http\Request;
use PHPUnit\Framework\Test;

class TechniciansApiController extends Controller
{
    public function index(){
        return TechniciansResource::collection(Technician::all());
    }

    public function show(Technician $technician){
        return new TechniciansResource($technician);
    }

    public function store(Request $request){
        $technician =Technician::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'image' => $request->input('image'),
            'address' => $request->input('address'),
            'status' => $request->input('status'),
            'created_id' => $request->input('created_id'),
        ]);

        return new TechniciansResource($technician);
    }

    public function edit(Technician $technician){

    }

    public function update(Technician $technician, Request $request){
        $technician->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'image' => $request->input('image'),
            'address' => $request->input('address'),
            'status' => $request->input('status'),
            'created_id' => $request->input('created_id'),
        ]);

        return new TechniciansResource($technician);
    }

    public function destroy(Technician $technician){
        $technician->delete();
        return response('Technician deleted Succesfully');
    }


}
