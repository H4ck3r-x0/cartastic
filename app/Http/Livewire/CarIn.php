<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class CarIn extends Component
{
    public $showCarInForm = false;
    public $clientPhone = '';
    public $lookedUpClient = null;

    public function updatedShowCarInForm()
    {
        $this->clientPhone = '';
        $this->lookedUpClient = null;
    }

    public function updatedClientPhone()
    {
        if (empty($this->clientPhone)) {
            $this->lookedUpClient = null;
        }
    }

    public function lookupClientPhone($clientPhone)
    {
        $client = Client::where('phone', $clientPhone)->first();
        $this->lookedUpClient = $client;
    }

    public function render()
    {
        return view('livewire.car-in');
    }
}
