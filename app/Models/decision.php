<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class decision extends Model
{
    use HasFactory;

    protected $fillable = [
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
