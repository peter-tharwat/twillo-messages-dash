<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded=[];
    /*public function contacts()
    {
    	return $this->hasMany('\App\Models\Contact');
    }*/
    public function contacts(){
        return $this->belongsToMany('App\Models\Contact','contact_tags','tag_id','contact_id');
    }
}
