<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPagePosition extends Model
{
    protected $table = 'home_positions';
    protected $primaryKey = 'id';
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
    protected $hidden = [];

    public static function getLandingPagePositions($landing_page_id, $home_position_type_key=false) {
        $locale = config('app.locale');
        $objects = self::select('home_positions.*','home_positions_locale.*',
            'home_position_types.type as home_position_type',
            'home_position_types.key as home_position_type_key'
        )
            ->leftJoin('home_positions_locale', function($leftJoin) use ($locale)
            {
                $leftJoin->on('home_positions_locale.home_position_id', '=', 'home_positions.id')
                    ->where('home_positions_locale.locale', '=', $locale);
            })
            ->leftJoin('home_position_types', 'home_position_types.id', '=', 'home_positions.position_type_id')
            ->where('home_positions.landing_page_id', $landing_page_id)
            ->where('home_positions.status', 1);

        if ($home_position_type_key) {
            $objects->where('home_position_types.key', $home_position_type_key);
        }

        $objects = $objects->orderBy('ordering_block', 'asc')
            ->get()->toArray();

        $rs = [];
        foreach ($objects as $item) {
            if ($item['home_position_type'] == 'all') {
                // default lấy từ table home_position_images
                $m = new LandingPagePositionImage();
                $item['items'] = $m->getLandingPagePositionImages($item['id']);
            } elseif($item['home_position_type'] == 'relationship'){
                $item['items'] = self::getItemsRelate($item['id']);
            } else {
                $item['items'] = [];
            }

            $key = $item['home_position_type_key']=='block' ? 'block-'.$item['id'] : $item['home_position_type_key'];
            $rs[$key] = $item;
        }

        return $rs;
    }

    public static function getItemsRelate($home_position_id){
        $relation = HomePositionsRelationship::where('home_position_id',$home_position_id)->first();
        if(empty($relation['model'])){
            return[];
        }
        $model = '\App\Models\\'.$relation['model'];
        if(!class_exists($model)){
            return[];
        }
        $model = new $model;
        $primaryKey = $model->getKeyName();
        $table = $model->getTable();
        return $model->select($table.'.*')
            ->join('home_positions_objects','home_positions_objects.object_id','=',$table.'.'.$primaryKey)
            ->where('home_positions_objects.home_position_id',$home_position_id)
            ->active()
            ->orderBy('home_positions_objects.ordering')
            ->get()->toArray();
    }
}
