<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\CarType;
use Livewire\Component;

class Report extends Component
{
    public $invoices = [];
    public $cars = [];
    public $query = '';
    public $totalGrand;
    public $totalPrice;
    public $totalTaxes;
    public $carType = '';


    public function mount()
    {
        $this->invoices = Invoice::latest()->get();
        $this->cars = CarType::latest()->get();
        $this->totalGrand = $this->invoices->sum('totalPriceWithTax');
        $this->totalPrice = $this->invoices->sum('totalPrice');
        $this->taxCalcluation();
    }

    public function taxCalcluation()
    {
        $collection = collect($this->invoices);
        $this->totalTaxes = array_reduce($collection->toArray(), function ($sum, $item) {
            $taxes = ($item['totalPrice'] / 100) * $item['taxRate'];
            return $sum += $taxes;
        }, 0);
    }

    public function updatedQuery()
    {
        $this->search($this->query);
    }

    public function delete($invoiceId)
    {
        Invoice::destroy($invoiceId);
        $this->mount();
        $this->render();
    }

    public function showInvoice($invoiceId)
    {
        $this->emit('showInvoice', $invoiceId);
    }

    public function render()
    {
        return view('livewire.reports.report');
    }

    public function updatedCarType()
    {
        $this->filterTableByCarType();
    }

    protected function filterTableByCarType()
    {
        if (!empty($this->carType)) {
            $this->invoices = Invoice::latest()
                ->where('client_car', $this->carType)
                ->get();
        } else {
            $this->invoices = Invoice::latest()->get();
        }
    }

    // TODO Refactor
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
                })
                ->orWhereHas('user', function ($query) use ($searchQuery) {
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
