<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['company', 'first_name', 'last_name', 'email', 'phone'];
    //relation with company
    public function companies(){
    	return $this->belongsTo('App\Models\Company', 'company');
    }
}
