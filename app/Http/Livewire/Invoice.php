<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Service;
use Livewire\Component;

class Invoice extends Component
{
    protected $listeners = ['confirmNewCarIn' => 'confirmNewCarIn'];
    public $showInvoice = false;
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
        $this->showInvoice = true;
        $this->getClientDetails($clientId);
        $this->getClientServices($selectedServices);
        $this->taxRate = $taxRate;
        $this->totalPrice = $totalPrice;
        $this->totalPriceWithTax = (int)$totalPriceWithTax;
        $this->clientCarType = $clientCarType;
    }

    public function render()
    {
        return view('livewire.invoice');
    }
    protected function getClientDetails($clientId)
    {
        $this->client = Client::find($clientId);
    }
    protected function getClientServices($serviceIds)
    {
        $this->servcies = Service::findMany($serviceIds);
    }
}
