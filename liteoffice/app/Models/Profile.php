<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'avatar',
        'user_id',
        'about',
        'phone',
        'address',
        'date_of_birth',
        
        'business_id',

        'employer_id',

    ];

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function business(){
        return $this->belongsTo(Business::class);
    }
}
