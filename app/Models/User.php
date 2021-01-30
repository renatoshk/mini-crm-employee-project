<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //relation with roles table
    public function role(){
        return $this->belongsTo('App\Models\Role', 'role_id');
    }
    //relation with companies 
    public function companies(){
        return $this->hasMany('App\Models\Company');
    }
    //check if it is admin or simple user
    public function isAdmin(){
        if($this->role->name == 'Admin'){
            return true;
        }
        else {
            return false;
        }
    }
}
