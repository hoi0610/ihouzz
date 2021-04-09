<?php
namespace App\Models;

class HomePositionsRelationship extends BaseModel
{    
    protected $table = 'home_positions_relationship';

    protected $primaryKey = 'id';

    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}