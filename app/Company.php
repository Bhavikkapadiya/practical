<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['id','name','email','logo','website','created_at','updated_at'];
    
    public function employees()
    {
        return $this->hasMany('App\Employees');
    }
}