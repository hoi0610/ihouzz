<?php
namespace App\Repositories\LandingPagePosition;

interface LandingPagePositionRepositoryInterface
{
    public function getLandingPagePositions($landing_page_id, $home_position_type_key=false);
    public function getItemsRelate($home_position_id);
}
