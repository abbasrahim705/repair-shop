<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;
    protected $table = "technicians";
    protected $fillable=[
        'name',
        'email',
        'address',
        'phone',
        'experience',
        'registration',
        'status',
        'image',
        'created_id'


    ];
    public function scopeWhereTech($query, $arg){
        return $query->where("status", $arg);
    }

    public function orders(){
        return $this->hasMany(WorkOrder::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'created_id');
    }
}
