<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = ['token'];
    public $timestamps=false;
    protected $primaryKey="RollNo";
}
