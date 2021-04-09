<?php
namespace App\Repositories\Agents;

use App\Models\Agents;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class AgentsRepository extends BaseRepository implements AgentsRepositoryInterface
{
    public function getModel()
    {
        return Agents::class;
    }

    public function find($id){
        $query = $query = $this->model->select(
            'agents.*',
            DB::raw("CONCAT_WS(' ', districts.type, districts.name) as district_name"),
            DB::raw("CONCAT_WS(' ', provinces.type, provinces.name) as province_name"),
            DB::raw("CONCAT_WS(', ', CONCAT_WS(' ', wards.type, wards.name), CONCAT_WS(' ', districts.type, districts.name) , CONCAT_WS(' ', provinces.type, provinces.name)) as address")
        )->active();

        $query->leftjoin('provinces', 'provinces.province_id', '=', 'agents.province_id');
        $query->leftjoin('districts', 'districts.district_id', '=', 'agents.district_id');
        $query->leftjoin('wards', 'wards.ward_id', '=', 'agents.ward_id');

        $object = $query->find($id);

        return $object;
    }

    public function getList($attr=[]){
        $limit = 8;

        $query = $this->model->select(
            'agents.*',
            DB::raw("CONCAT_WS(', ', CONCAT_WS(' ', wards.type, wards.name), CONCAT_WS(' ', districts.type, districts.name) , CONCAT_WS(' ', provinces.type, provinces.name)) as address")
        )->active();

        $query->leftjoin('provinces', 'provinces.province_id', '=', 'agents.province_id');
        $query->leftjoin('districts', 'districts.district_id', '=', 'agents.district_id');
        $query->leftjoin('wards', 'wards.ward_id', '=', 'agents.ward_id');

        if(!empty($attr['province_id'])){
            $query->where('agents.province_id',$attr['province_id']);
        }
        if(!empty($attr['district_id'])){
            $query->where('agents.district_id',$attr['district_id']);
        }
        if(!empty($attr['filter'])){
            if($attr['filter'] == 'is_hot'){
                $query->where('agents.is_hot',1);
            }
        }

        $data = $query->paginate($limit)->toArray();


        return $data;
    }
}
