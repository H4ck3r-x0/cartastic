<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use App\Models\Client;
use App\Models\CarType;
use App\Models\Service;
use Livewire\Component;
use App\Models\Tax;

class CarIn extends Component
{
    protected $listeners = ['serviceAdded' => 'calculateTotalPrice'];
    public $showCarInForm = false;
    public $clientPhone = '';
    public $clientName = '';
    public $lookedUpClient = null;
    public $step = 1;
    public $newClientPhone = '';
    public $newClientName = '';
    public $carTypes;
    public $services;
    public $selectedCarType = '';
    public $selectedServices = [];
    public $scheduledWash = 1;
    public $totalPrice = 0.0;
    public $taxRate;
    public $totalPriceWithTax;

    public function mount()
    {
        $this->carTypes = CarType::latest()->get();
        $this->services = Service::where('id', 1)->get();
        $this->taxRate = Tax::latest()->first();
    }

    public function updatedSelectedCarType($value)
    {
        $this->selectedServices = [];
        $this->totalPrice = 0.0;
        $this->totalPriceWithTax = 0;
        $this->services = Service::where('car_types_id', $value)->get();
    }

    public function calculateTotalPrice()
    {
        $getAll = Service::findMany($this->selectedServices);
        $this->totalPrice = array_reduce($getAll->toArray(), function ($sum, $item) {
            return $sum += $item['price'];
        }, 0);
        $taxCalculation = ($this->totalPrice / 100) * $this->taxRate->tax;
        $this->totalPriceWithTax = $this->totalPrice - $taxCalculation;
    }

    public function updatedShowCarInForm()
    {
        $this->clientPhone = '';
        $this->lookedUpClient = null;
        $this->selectedCarType = '';
        $this->selectedServices = [];
        $this->step = 1;
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
        if ($client !== null) {
            $this->lookedUpClient = $client;
        } else {
            $this->step = 2;
            $this->newClientPhone = $this->clientPhone;
            $this->clientPhone = '';
        }
    }

    public function signUpNewClient()
    {
        $client = Client::create(
            [
                'name' => $this->newClientName,
                'phone' => $this->newClientPhone
            ]
        );
        if ($client) {
            $this->clientPhone = $client->phone;
            $this->cleanClientData();
            $this->step = 1;
        }
    }

    public function render()
    {
        return view('livewire.car-in');
    }

    protected function cleanClientData()
    {
        $this->lookedUpClient = null;
        $this->newClientPhone = '';
        $this->newClientName = '';
    }
}
