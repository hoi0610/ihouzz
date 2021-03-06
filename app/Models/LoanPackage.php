<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanPackage extends Model
{
    use HasFactory;
    protected $table = 'loan_packages';


    public function bank()
    {
        return $this->belongsTo(Banks::class);
    }

}
