<?php
namespace App\Repositories\LoanPackage;

interface LoanPackageRepositoryInterface
{
    public function find($id);
    public function getList($attr=[]);
}
