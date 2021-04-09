<?php
namespace App\Models;

class ProductsImages extends BaseModel
{
    protected $is_deleted   = true;
    protected $table        = 'products_images';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'image_url',
        'product_id',
    ];

    protected $hidden = [];
}
