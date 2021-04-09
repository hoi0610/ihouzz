<?php
namespace App\Models;

class LandTypes extends BaseModel
{
    protected $is_deleted   = true;
    protected $table        = 'land_types';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'position',
        'status',
        'is_deleted',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [];
}
