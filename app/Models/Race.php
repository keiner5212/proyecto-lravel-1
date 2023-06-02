<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function users(){
        return $this->belongsToMany(User::class, 'inscriptions')->withPivot('dorsal');
    }
    protected $fillable = ['token'];
    public $timestamps=false;
}
