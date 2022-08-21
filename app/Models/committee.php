<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class committee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey="committeeID";
    
    public function tasks(){
        return $this->hasMany('App\Models\task');
    }
    public function sessions(){
        return $this->hasMany('App\Models\session')->orderBy('sessionDate', 'ASC');
    }
    public function regulations(){
        return $this->hasMany('App\Models\regulation');
    }
    public function members(){
        return $this->hasMany('App\Models\member');
    }
    public function sessiontopics(){
        return $this->hasMany('App\Models\sessiontopic');
    }
    
}
