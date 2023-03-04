<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurer extends Model
{
    protected $fillable = ['token'];
    public $timestamps=false;
    protected $primaryKey="RollNo";
}
