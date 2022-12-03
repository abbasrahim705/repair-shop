<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Setting;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // public function additem(){
    //     return view("item.create-item",[
    //         'categories' => Category::all()
    //     ]);
    // }
    public function store(Request $request){

        if($request->isMethod("POST")){
            $request->validate([
                "name"=>"required",
                "category_id"=>"required",
                "amount"=>"required",
                "serial_no"=>"required",
                "description"=>"required",
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

        }

        $item = new Item();
        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->description= $request->description;
        $item->amount = $request->amount;
        $item->serial_no = $request->serial_no;
        $item->created_by = auth()->user()->id;
        if ($image = $request->file('image')) {
            $destinationPath = 'images/item/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $item['image'] = "$profileImage";
        }
        $item->save();
        session()->flash("success","The item has been stored");
        return redirect("item-list");
    }
    public function index(){
        $item_all = Item::all();
        return view("item.items-list",[
            "products"=>$item_all,
            'categories' => Category::all(),
            'setting' => Setting::first()

        ]);
    }
    public function edit($id){
        $item = Item::find($id);
        return view("item.update-item",[
            "item" =>$item,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request){
        // dd(request()->all());
        $attributes = request()->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'serial_no' => 'required',
            'category_id' => 'required',

        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'images/item/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $attributes['image'] = "$profileImage";
        }
        $attributes['created_by'] = auth()->user()->id;
        Item::where('id',$attributes['id'])->update($attributes);
        return redirect(route('item-list'))->with('success','Item Updated');

    }
    public function destroy($id){
        $item = Item::find($id);
        $item->delete();
        session()->flash("success", "The  has been item deleted successfully");
        return redirect("item-list");
    }

    public function items(){
        return view('item.items-list',[
            'products' => Item::all(),
            'categories' => Category::all()
        ]);
    }

    public function getItem($id){
        $item = Item::find($id);
        WorkOrder::create([
            'item_id' => $item->id,
            'net_balance' => $item->amount,
            'payment_status' => 'paid',
            'client_id' => auth()->user()->id
        ]);

        return redirect(route('ItemsBought'))->with('success','Item Bought Succesfully');
    }

    public function ItemsBought(){
        return view('clients.itemsBought',[
            'products' => WorkOrder::where('service_id',null)->get()
        ]);
    }
}
