<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function users(){
        return $this->belongsToMany(User::class, 'inscriptions')->withPivot('time','qr','bibNumber','ifPay');
    }
    protected $fillable = ['token'];
    public $timestamps=false;
}
