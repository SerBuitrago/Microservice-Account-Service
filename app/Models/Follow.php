<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
  
    protected $table = 'followers';

    protected $fillable = ['id_follower', 'id_followed'];
}
