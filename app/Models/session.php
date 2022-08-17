<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class session extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey="sessionID";
    public function committee(){
        return $this->belongsTo('App\Models\committee');
    }
    public function discussiontopics(){
        return $this->hasMany('App\Models\discussiontopic'); 
    }
    public function sessiontopics(){
        return $this->hasMany('App\Models\sessiontopic');
    }

}
