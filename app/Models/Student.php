<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'code';
    protected $table = 'students';

    protected $fillable = ['code', 'name','last_name','address','age' ,'phone'
    ,'email', 'semester','university_career'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
