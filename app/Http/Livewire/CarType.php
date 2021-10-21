<?php

namespace App\Http\Livewire;

use App\Models\CarType as Type;
use Livewire\Component;

class CarType extends Component
{
    public $types;
    public $name = '';

    public function mount()
    {
        $this->types = Type::latest()->get();
    }

    public function save()
    {
        $type = Type::create(['name' => $this->name]);
        $this->types->prepend($type);
        $this->name = '';
    }

    public function delete($typeId)
    {
        Type::destroy($typeId);
        $this->mount();
        $this->render();
    }

    public function render()
    {
        return view('livewire.car-type');
    }
}
