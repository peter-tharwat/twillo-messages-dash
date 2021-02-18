<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactTag extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function contact()
    {
    	return $this->belongsTo('\App\Models\Contact');
    }
    public function tag()
    {
    	return $this->belongsTo('\App\Models\Tag');
    }
}
