<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function employes()
    {
        return $this->hasMany(Employe::class);
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class)->where('isCanceled', 0);
    }

    use HasFactory;
}