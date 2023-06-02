<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }


    protected $fillable = ['token'];
    public $timestamps=false;
    protected $primaryKey="RollNo";
}
