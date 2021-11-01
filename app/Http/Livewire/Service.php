<?php

namespace App\Http\Livewire;

use App\Models\Service as CarService;
use App\Models\CarType;
use Livewire\Component;

class Service extends Component
{
    public $services;
    public $types;
    public $name = '';
    public $price;
    public $car_types_id;

    public function mount()
    {
        $this->services = CarService::with('carType')->latest()->get();
        $this->types = CarType::latest()->get();
    }

    public function save()
    {
        $service = CarService::create(
            [
                'name' => $this->name,
                'price' => $this->price,
                'car_types_id' => $this->car_types_id
            ]
        );
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
