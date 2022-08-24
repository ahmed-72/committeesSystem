<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sessiontopic extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $primaryKey = ['committee_committeeID', 'session_sessionID','discussiontopic_topicID'];
    public $incrementing = false;

    protected $fillable = [
        'deliberations',
        'decisions',
        'executionDepartment',
        'executionDeadline',

    ];


    public function committee(){
        return $this->belongsTo('App\Models\committee');
    }
    public function session(){
        return $this->belongsTo('App\Models\session');
    }
    public function discussiontopic(){
        return $this->belongsTo('App\Models\discussiontopic'); 
    } 
    protected $casts = [
        'decisions'=> 'array',
        'executionDepartment'=> 'array',
        'executionDeadline'=> 'array',

    ];

    
  
}
