<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleUser extends Model
{
    use HasFactory;
    protected $table="role_user";

    protected $fillable = [
        'user_id', 'role_id', 'created_at','updated_at~'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function role(){
        return $this->belongsTo('App\Models\role');
    }
}
