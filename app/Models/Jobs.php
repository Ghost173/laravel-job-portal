<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Jobs extends Model
{

    // protected $guraeded =[];

    protected $fillable = [
        'user_id', 'company_id', 'title', 'slung', 'description', 'roles', 'category_id', 'position', 'address', 'category_id', 'type', 'status', 'laste_date'
    ];
    //use HasFactory;
    public function getRouteKeyName()
    {
         return 'slung';
    }
public function company() {
    return $this->belongsTo('App\Models\Company');
}

public function users() {
    return $this->belongsToMany(User::class)->withTimestamps();
}

public function checkApplication(){
    return \DB::table('jobs_user')->where('user_id',auth()->user()->id)->where('jobs_id',$this->id)->exists();
}
}
