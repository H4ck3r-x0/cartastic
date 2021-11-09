<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Client;
use Livewire\Component;

class ViewClientInvoices extends Component
{
    public $client;

    public function mount(Request $request)
    {
        $this->client = Client::with('invoices')->find($request->client);
    }

    public function render()
    {
        return view('livewire.view-client-invoices');
    }
}
