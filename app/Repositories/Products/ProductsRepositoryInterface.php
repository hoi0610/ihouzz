<?php
namespace App\Repositories\Products;

interface ProductsRepositoryInterface
{
    public function groupProductByDistrict($data);
    public function find($id);
    public function findProductSameStreet($id);
    public function findProductSamePrice($id);
    public function groupProductByStatus($params);
}
