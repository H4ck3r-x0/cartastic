<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class Report extends Component
{
    public $invoices = [];
    public $query = '';
    public $totalGrand;
    public $totalPrice;
    public $totalTaxes;

    public function mount()
    {
        $this->invoices = Invoice::latest()->get();
        $this->totalGrand = $this->invoices->sum('totalPriceWithTax');
        $this->totalPrice = $this->invoices->sum('totalPrice');
        $this->taxCalcluation();
    }

    public function taxCalcluation()
    {
        $collection = collect($this->invoices);
        $this->totalTaxes = array_reduce($collection->toArray(), function ($sum, $item) {
            $taxes = ($item['totalPrice'] / 100) * $item['taxRate'];
            return $sum += (int)$taxes;
        }, 0);
    }

    public function updatedQuery()
    {
        $this->search($this->query);
    }

    public function render()
    {
        return view('livewire.report');
    }

    protected function search($searchQuery)
    {
        $searchQuery = $this->query;
        if ($searchQuery !== '') {
            $this->invoices = Invoice::where('id', $this->query)
                ->orWhere('client_car', $this->query)
                ->orWhereHas('client', function ($query) use ($searchQuery) {
                    $query->where('phone', $searchQuery);
                })
                ->orWhereHas('client', function ($query) use ($searchQuery) {
                    $query->where('name', $searchQuery);
                })->get();
            $this->totalGrand = $this->invoices->sum('totalPriceWithTax');
            $this->taxCalcluation();
            $this->totalPrice = $this->invoices->sum('totalPrice');
        } else {
            $this->invoices = Invoice::latest()->get();
            $this->totalGrand = $this->invoices->sum('totalPriceWithTax');
            $this->taxCalcluation();
            $this->totalPrice = $this->invoices->sum('totalPrice');
        }
    }
}
