<?php
namespace App\Models;

class Banner extends BaseModel
{
    protected $is_deleted   = true;
    protected $table        = 'banners';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
}
