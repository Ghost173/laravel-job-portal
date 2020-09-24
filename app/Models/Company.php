<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'user_id','cname','slug','address','phone','website','logo','cover_photo','slogan','description'
    ];
    // use HasFactory;
    public function jobs() {
        return $this->hasMany('App\Models\Jobs');
    }
    public function getRouteKeyName()
    {
         return 'slug';
    }
}
