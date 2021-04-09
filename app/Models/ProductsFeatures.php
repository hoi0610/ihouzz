<?php
namespace App\Models;

class ProductsFeatures extends BaseModel
{
    protected $is_deleted   = true;
    protected $table        = 'products_features';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'class_icon',
        'description',
        'is_range',
        'is_show_detail',
        'is_show_cms',
        'position',
        'status',
        'is_deleted',
    ];

    protected $hidden = [];

    public function variants() {
        return $this->hasMany(ProductsFeaturesVariants::class, 'feature_id');
    }
}
