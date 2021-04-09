<?php
namespace App\Models;

class ProductsFeaturesVariants extends BaseModel
{
    protected $is_deleted   = true;
    protected $table        = 'products_features_variants';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'feature_id',
        'description',
        'from',
        'to',
        'position',
        'status',
        'is_deleted',
    ];

    protected $hidden = [];

}
