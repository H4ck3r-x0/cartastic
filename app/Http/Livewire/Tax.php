<?php

namespace App\Http\Livewire;

use App\Models\Tax as Taxes;
use Livewire\Component;

class Tax extends Component
{
    public $tax;
    public $taxes;
    public function mount()
    {
        $this->taxes = Taxes::latest()->first();
        $this->tax = $this->taxes['tax'];
    }

    public function save()
    {
        Taxes::firstOrCreate(['tax' => $this->tax]);
    }

    public function render()
    {
        return view('livewire.tax');
    }
}
