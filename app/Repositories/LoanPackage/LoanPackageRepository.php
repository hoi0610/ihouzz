<?php
namespace App\Repositories\LoanPackage;

use App\Models\LoanPackage;
use App\Repositories\BaseRepository;
use App\Repositories\LoanPackage\LoanPackageRepositoryInterface;
use Illuminate\Support\Facades\DB;

class LoanPackageRepository extends BaseRepository
{
    public function getModel()
    {
        return LoanPackage::class;
    }

}
