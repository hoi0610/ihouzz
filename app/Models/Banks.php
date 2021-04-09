<?php
namespace App\Models;

class Banks extends BaseModel
{
    protected $is_deleted   = true;
    protected $table        = 'banks';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'short_name',
        'name',
        'position',
        'is_delete',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'

    ];
}
