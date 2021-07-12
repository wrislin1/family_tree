<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relations extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','user2_id','relation','information'];
    protected $dates = ['created_at','updated_at'];
}
