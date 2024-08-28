<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_id',
        'profile_id',
        'position',
        'department_id',
        'role_id',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function roles(){
        return $this->belongsToMany(OfficeRole::class, 'employee_role');  
    }
}
