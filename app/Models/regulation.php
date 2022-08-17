<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class regulation extends Model
{
    use HasFactory;
   // use SoftDeletes;
    protected $primaryKey="regulationID";
    
    public function committee(){
        return $this->belongsTo('App\Models\committee');
    }
   

}
