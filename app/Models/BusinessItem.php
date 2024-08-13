<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class BusinessItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_id',
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'item_type',
    ];

    const ITEM_TYPE_CATALOG = 'Catalog';
    const ITEM_TYPE_DOCUMENT = 'Document';

    public static function getItemType(){
        return [
            self::ITEM_TYPE_CATALOG,
            self::ITEM_TYPE_DOCUMENT,
        ];
    }

    public function business(){
        return $this->belongsTo(Business::class);
    }

    public static function create(array $attributes=[]){
        if (!in_array($attributes['item_type'], self::getItemType())){
            throw new Exception('Invalid item type');
        }

        return parent::create($attributes);
    }

    public function office_permissions(){
        return $this->hasMany(OfficePermission::class, 'business_items_permissions');
    }
}
