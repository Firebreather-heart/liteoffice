<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    use HasFactory;

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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function business(){
        return $this->belongsTo(Business::class);
    }
}
