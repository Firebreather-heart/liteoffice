<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeRole extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'business_id',
    ];

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';
    
    public function permissions(){
        return $this->hasMany(OfficePermission::class);
    }

    public function employees(){
        return $this->belongsToMany(Employee::class, 'employee_role');
    }

    public function business(){
        return $this->hasOne(Business::class, );
    }
}
