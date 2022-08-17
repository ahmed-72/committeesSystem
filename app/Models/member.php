<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class member extends Model
{
    use HasFactory;
    use SoftDeletes , Notifiable;

    protected $primaryKey = "memberID";
    public function committee(){
        return $this->belongsTo('App\Models\committee');
    }
    public function employee(){
        return $this->belongsTo('App\Models\employee');
    }
}
