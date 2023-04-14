<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employe extends Authenticatable
{
    use HasFactory;

    protected $guard = 'employes';
    
    protected $fillable = [
        'company_id','fullname','email', 'phone','address','date_naissance','password' ,'status','isFirstTime'

    ];
}