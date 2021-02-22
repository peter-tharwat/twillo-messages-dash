<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded=[];
    public function contact()
    {
    	return $this->belongsTo('\App\Models\Contact');
    }
    public function template()
    {
    	return $this->belongsTo('\App\Models\MessageTemplate');
    }
}
