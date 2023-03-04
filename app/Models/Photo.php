<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['token'];
    protected $table="photos";
    public $timestamps=false;
    protected $primaryKey="RollNo";
}
