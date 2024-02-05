<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'post_description', 'user_id'];

    public function user(){
        return $this->belongsto('App\Models\User', 'user_id');
    }
}
