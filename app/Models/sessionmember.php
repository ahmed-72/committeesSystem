<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sessionmember extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function committee(){
        return $this->belongsTo('App\Models\committee');
    }
    public function session(){
        return $this->belongsTo('App\Models\session');
    }
    public function member(){
        return $this->belongsTo('App\Models\member');
    }
}
