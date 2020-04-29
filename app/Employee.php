<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['id','company_id','fname','lname','email','phone','created_at','updated_at'];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}