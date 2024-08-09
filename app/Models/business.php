<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business extends Model
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
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }
}
