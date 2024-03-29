<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    use HasFactory;

    protected $fillable= ['id', 'picture', 'about', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
