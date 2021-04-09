<?php
namespace App\Repositories\Products;

use App\Models\District;
use App\Models\Products;
use App\Models\Ward;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class ProductsRepository extends BaseRepository implements ProductsRepositoryInterface
{
    public function getModel()
    {
        return Products::class;
    }

    public function groupProductByDistrict($data){
        $products = [];
        $ward = [];
        foreach($data as $item){
            if(empty($ward[$item['ward_id']])){
                $ward[$item['ward_id']] = Ward::getAddressByWard($item['ward_id']);
            }
            $item['address'] = $ward[$item['ward_id']]??'';
            $products[$item['district_id']][] = $item;
        }

        $district_ids = array_keys($products);
        $district = District::whereIn('district_id',$district_ids)->get()->pluck('name','district_id')->toArray();

        return [
            'products' => $products,
            'district' => $district
        ];
    }

    public function find($id) {
        return Products::with(
            'images',
            'legal_documents',
            'direction',
            'status',
            'agent',
            'type',
            'unit',
            'land_types',
            'province',
            'district',
            'ward',
            'features'
        )->findOrFail($id);
    }

    public function findProductSameStreet($id) {
        $product = Products::findOrFail($id);
        return Products::with([
            'images',
            'legal_documents',
            'direction',
            'status',
            'agent',
            'type',
            'unit',
            'land_types',
            'province',
            'district',
            'ward'
        ])->where([
            ['street', 'like', '%'.$product->street.'%'],
            ['id' , '<>', $product->id]
        ])->latest()->get();
    }
    public function findProductSamePrice($id) {
        $product = Products::findOrFail($id);
        return Products::with([
            'images',
            'legal_documents',
            'direction',
            'status',
            'agent',
            'type',
            'unit',
            'land_types',
            'province',
            'district',
            'ward'
        ])->where([
            ['list_price', '=', $product->list_price],
            ['id' , '<>', $product->id]
        ])->latest()->get();
    }
    
    public function groupProductByStatus($params){
        $data = $this->model->where([
            'province_id' => $params->province_id
        ])->paginate(16);

        return $data;
    }
}
