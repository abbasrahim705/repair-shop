<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'shop_name','shop_slogan','owner_name','address','map_address','email',
        'contact_no','web_address','facebook','whatsapp','instagram','youtube',
        'tiktok','linkedin','edited_by','logo'
    ];

    public function admin(){
        return $this->belongsTo(User::class,'edited_by');
    }
}
