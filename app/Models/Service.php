<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $fillable = [
        'name',
        'description',
        'amount',
        'created_by'
    ];

    public function orders(){
        return $this->hasMany(WorkOrder::class,'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }

}
