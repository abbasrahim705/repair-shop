<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ItemApiController extends Controller
{
     //
     public function index()
     {
        return  ItemResource::collection(Item::all());
     }

    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    public function create(){
        //
    }

    public function store(Request $request){

       $item = Item::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'image' => $request->input('image'),
            'serial_no' => $request->input('serial_no'),
            'category_id' => $request->input('category_id'),
            'created_by' => $request->input('created_by'),
        ]);

        return new ItemResource($item);
    }

    public function update(Request $request ,Item $item){
        $item->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'image' => $request->input('image'),
            'serial_no' => $request->input('serial_no'),
            'category_id' => $request->input('category_id'),
            'created_by' => $request->input('created_by'),
        ]);

        return new ItemResource($item);
    }

    public function destroy(Item $item){
        $item->delete();
        return response('Item has been Deleted');
    }

//     public function createitem(Request $request){
//         $request->validate([
//             "name" =>"required",
//             "category" =>"required",
//             "amount" =>"required",
//             "serial_no" =>"required",
//             "description" =>"required",
//             'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

//         ]);
//         $image_path = $request->file('image')->store('image', 'public');

//         $data = Item::create([
//             'image' => $image_path,
//         ]);

//         return response($data, Response::HTTP_CREATED);
//         $item = Item::create($request->all());

//     return response()->json([
//         'message' => "Product saved successfully!",
//         'Items' => $item
//     ], 200);

//     }
//     public function updateitem(Request $request, $id){
//         $request->validate([
//             "name" =>"required",
//             "category" =>"required",
//             "amount" =>"required",
//             "serial_no" =>"required",
//             "description" =>"required",
//             'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
//         ]);

//         $item=Item::find($id);
//         if ($item){
//         $item->name = $request->name;
//         $item->category = $request->category;
//         $item->amount = $request->amount;
//         $item->description = $request->description;
//         $item->serial_no = $request->serial_no;

//         $image_path = $request->file('image')->store('image', 'public');

//         $data = Item::create([
//             'image' => $image_path,
//         ]);

//         return response($data, Response::HTTP_CREATED);
//         $client = Item::create($request->all());

//         $client->update();

//             return response()->json([
//                 'message' => "Product updated successfully!",
//                 'Items' => $client
//             ], 200);
//         }
//         else
//         {
//             return response()->json([
//                 'message' => "Product updated unsuccessfully!"],404);

//         }


//     }
//     function searchitem($name){
//         return Item::Where("name".$name)->get();
//     }
//     public function deleteitem(Item $product)
//     {
//     $product->delete();

//     return response()->json([
//         'message' => "Product deleted successfully!",
//     ], 200);
// }
// public function Usersearch($id){
//     $item= Item::find($id);
//     if(is_null($item)){
//         return response()->json(['message'=>'User Not Found'], 400);

//     }
//     return response()->json($item::find($id),200);
// }


}
