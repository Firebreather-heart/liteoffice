<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficePermission extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'business_id',
        'business_item_id',
        'office_role_id',
    ];

    public function roles(){
        return $this->belongsTo(OfficeRole::class);
    }

    public function businessItem(){
        return $this->belongsTo(BusinessItem::class);
    }

    public function business(){
        return $this->belongsTo(Business::class);
    }
}
