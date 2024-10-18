<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'name',
        'business_id',
    ];

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';
    
    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
