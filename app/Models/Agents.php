<?php
namespace App\Models;

class Agents extends BaseModel
{
    protected $is_deleted   = true;
    protected $table        = 'agents';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
}
