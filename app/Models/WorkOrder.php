<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id','item_id','assigned_to','status','service_id','net_balance','balance','discount'
    ];

    public function clients(){
        return $this->belongsToMany(User::class,'client_id');
    }

    public function items(){
        return $this->belongsTo(Item::class,'item_id');
    }

    public function services(){
        return $this->belongsTo(Service::class,'service_id');
    }

    public function technicians(){
        return $this->belongsTo(Technician::class,'assigned_to');
    }
}
