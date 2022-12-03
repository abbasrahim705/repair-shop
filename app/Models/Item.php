<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = "items";
    protected $fillable = [
        'name',
        'category',
        'amount',
        'serial_no',
        'description',
        'image',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orders(){
        return $this->hasMany(WorkOrder::class,'item_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
}
