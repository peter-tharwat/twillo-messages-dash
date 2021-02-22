<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    use HasFactory;
    protected $guarded=[];
    public function import()
    {
    	return $this->belongsTo('\App\Models\Import');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag','contact_tags','contact_id','tag_id');
    }

    /*public function tags()
    {
    	return $this->hasMany('\App\Models\ContactTag');
    }*/
    public function messages()
    {
    	return $this->hasMany('\App\Models\Message');
    }
}
