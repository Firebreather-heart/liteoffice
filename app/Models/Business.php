<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'description',
        'type',
        'logo',
        'coordinates',
        'cover_photo',
        'owner_id',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function employees(){
        return $this->hasMany(Profile::class);
    }

    public function departments(){
        return $this->hasMany(Department::class);
    }

    public function items(){
        return $this->hasMany(BusinessItem::class);
    }

    public function role(){
        return $this->hasMany(OfficeRole::class);
    }

    public function permissions(){
        return $this->hasMany(OfficePermission::class);
    }   
}
