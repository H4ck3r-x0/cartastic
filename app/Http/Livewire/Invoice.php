<?php

namespace App\Http\Livewire;

use App\Models\Invoice as Invoices;
use App\Models\Service;
use Livewire\Component;

class Invoice extends Component
{
    protected $listeners = ['confirmNewCarIn' => 'confirmNewCarIn'];
    public $showInvoice = false;
    public $invoceId;
    public $invoice_created_at;
    public $clientId;
    public $client = null;
    public $clientCarType;
    public $selectedServices = [];
    public $servcies;
    public $taxRate;
    public $totalPrice;
    public $totalPriceWithTax;

    public function confirmNewCarIn($clientId, $selectedServices, $taxRate, $totalPrice, $totalPriceWithTax, $clientCarType)
    {
        $newInvoice = Invoices::create([
            'client_id' => $clientId,
            'client_car' => $clientCarType,
            'services' => json_encode($selectedServices),
            'taxRate' => $taxRate,
            'totalPrice' => $totalPrice,
            'totalPriceWithTax' => $totalPriceWithTax
        ]);
        $this->showInvoice = true;
        $this->client = $newInvoice->client;
        $this->getClientServices($selectedServices);
        $this->taxRate = $taxRate;
        $this->totalPrice = $totalPrice;
        $this->totalPriceWithTax = (int)$totalPriceWithTax;
        $this->clientCarType = $clientCarType;
        $this->invoceId = $newInvoice->id;
        $this->invoice_created_at = $newInvoice->created_at->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.invoice');
    }

    protected function getClientServices($serviceIds)
    {
        $this->servcies = Service::findMany($serviceIds);
    }
}
