<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class discussiontopic extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="discussiontopics";
    public function committee(){
        return $this->belongsTo('App\Models\committee');
    }
    public function session(){
        return $this->belongsTo('App\Models\session');
    }
    public function employee(){
        return $this->belongsTo('App\Models\employee');
    }
    public function sessiontopics(){
        return $this->hasMany('App\Models\sessiontopic');
    }
}
