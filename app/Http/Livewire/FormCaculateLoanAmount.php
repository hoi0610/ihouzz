<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormCaculateLoanAmount extends Component
{
    public $allLoanPackage;
    public $bank_id=1;
    public $layout;

    public function render()
    {
        return view('livewire.form-caculate-loan-amount');
    }
}
