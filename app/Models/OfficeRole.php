<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'business_id',
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permission');
    }

    public function employees(){
        return $this->hasMany(Employee::class, 'employee_role');
    }

    public function business(){
        return $this->hasOne(Business::class, );
    }
}
