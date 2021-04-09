<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $primaryKey = 'district_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function getDistrictsOptions($params) {
        $query = District::select('district_id', \DB::raw("CONCAT_WS(' ', type, name) as district_name"))
            ->where('is_deleted', 0);

        if (isset($params['province_id'])) {
            $query->where('province_id', $params['province_id']);
        }

        if (isset($params['district_id'])) {
            $query->whereIn('district_id', $params['district_id']);
        }

        return $query->pluck('district_name', 'district_id');
    }

    public function product()
    {
        return $this->hasMany(Products::class);
    }
}
