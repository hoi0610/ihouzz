<?php

namespace App\Http\Livewire;

use App\Facade\ApiSetting;
use Carbon\Carbon;
use Livewire\Component;

class TablePriceTrends extends Component
{
    public $labels;
    public $labelsOriginal;
    public $priceRange;
    public $index;
    public $range_id;
    public $list;

    public function mount($labels, $id) {
        $this->labelsOriginal = $labels;
        $this->labels = collect($labels)->skip(count($labels) - 6)->take(6);
        $priceRangeApi = ApiSetting::listPriceRangePropertyinStreet($id);
        if( isset($priceRangeApi) && !is_null($priceRangeApi) && isset($priceRangeApi['data']) && !is_null($priceRangeApi['data'])) {
            $priceRange = $priceRangeApi['data'];
        } else {
            $priceRange = [];
        }

        $priceRange = collect($priceRange)->values()->all();
        $list = [];
        foreach ($priceRange as $item) {
            $list[] = collect($item['list'])->mapWithKeys(function ($item, $key) {
                return [Carbon::createFromFormat('m/Y', $key)->format('m/Y') => $item];
            })->all();
        }
        $this->list = $list;
        $this->priceRange = $priceRange;
        $this->index = count($labels) - 6;
        $this->range_id = $id;
    }

    public function prevMonth() {
        if($this->index >= 1) {
            $this->index = $this->index - 1;
        }
        $this->labels = collect($this->labelsOriginal)->skip($this->index)->take(6);
    }
    public function nextMonth() {
        if($this->index < (count($this->labelsOriginal) - 6)) {
            $this->index = $this->index + 1;
        }
        $this->labels = collect($this->labelsOriginal)->skip($this->index)->take(6);
    }
    public function render()
    {
        return view('livewire.table-price-trends');
    }
}
