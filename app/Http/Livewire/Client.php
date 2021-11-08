<?php

namespace App\Http\Livewire;

use App\Models\Client as Clients;
use Livewire\Component;

class Client extends Component
{
    public $clients = [];
    public $query = '';

    public function mount()
    {
        $this->clients = Clients::latest()->get();
    }

    public function updatedQuery()
    {
        $this->search($this->query);
    }


    public function delete($clientId)
    {
        Clients::destroy($clientId);
        $this->mount();
        $this->render();
    }

    public function render()
    {
        return view('livewire.client');
    }

    protected function search($searchQuery)
    {
        $searchQuery = $this->query;
        if ($searchQuery !== '') {
            $this->clients = Clients::where('id', $this->query)
                ->orWhere('name', $this->query)
                ->orWhere('phone', $this->query)
                ->get();
        } else {
            $this->clients = Clients::latest()->get();
        }
    }
}
