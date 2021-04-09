<?php
namespace App\Repositories\News;

use App\Models\News;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    public function getModel()
    {
        return News::class;
    }

}
