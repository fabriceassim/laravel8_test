<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email'];
    
    public function employees()
    {
    	return $this->hasMany('App\Models\Employees', 'company_id', 'employee_id');
    }

}
