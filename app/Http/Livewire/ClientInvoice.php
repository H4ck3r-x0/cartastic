<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\Service;
use Livewire\Component;

class ClientInvoice extends Component
{
    protected $listeners = ['showInvoice' => 'showInvoice'];
    public $invoiceId;
    public $invoice;
    public $services;

    public function showInvoice($invoiceId)
    {
        $this->invoiceId = $invoiceId;
        $this->invoice = Invoice::find($invoiceId);
        $this->getClientServices(json_decode($this->invoice->services));
    }

    public function render()
    {
        return view('livewire.client-invoice');
    }

    protected function getClientServices($serviceIds)
    {
        $this->servcies = Service::findMany($serviceIds);
    }
}
