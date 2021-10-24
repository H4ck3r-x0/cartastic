<?php

namespace App\Http\Livewire;

use App\Models\Service as CarService;
use Livewire\Component;

class Service extends Component
{
    public $services;
    public $name = '';
    public $price;

    public function mount()
    {
        $this->services = CarService::latest()->get();
    }

    public function save()
    {
        $service = CarService::create(['name' => $this->name, 'price' => $this->price]);
        $this->services->prepend($service);
        $this->name = '';
        $this->price = '';
    }

    public function delete($serviceId)
    {
        CarService::destroy($serviceId);
        $this->mount();
        $this->render();
    }

    public function render()
    {
        return view('livewire.service');
    }
}
