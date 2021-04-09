<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPagePositionImage extends Model
{
    protected $table = 'home_position_images';
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

    public function getLandingPagePositionImages($home_position_id) {
        $locale = config('app.locale');
        $objects = self::select('*')
            ->leftJoin('home_position_images_locale', function($leftJoin) use ($locale)
            {
                $leftJoin->on('home_position_images_locale.home_position_image_id', '=', 'home_position_images.home_position_image_id')
                    ->where('home_position_images_locale.locale', '=', $locale);
            })
            ->where('home_position_images.home_position_id', $home_position_id)
            ->where('home_position_images.status', 1)
            ->orderBy('home_position_images.ordering', 'asc')
            ->get()->toArray();

        return $objects;
    }
}
