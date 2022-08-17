<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class task extends Model
{
    use HasFactory;
  //  use SoftDeletes;
    
    protected $primaryKey="taskID";
        
    public function committee(){
        return $this->BelongsToMany('App\Models\committee');
    }
   
}
