<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class employee extends Model
{
    use HasFactory;
    use SoftDeletes , Notifiable;

    protected $primaryKey = "employeeID";

    public function members(){
        return $this->hasMany('App\Models\member');
    }
    public function discussiontopics(){
        return $this->hasMany('App\Models\discussiontopic');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    protected $casts=[
        'notification_options'=> 'json',
    ];

}
