<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class SearchClients extends Component
{
    public string $search = '';
    public int $client_id;
    public string|null $firstname;
    public string|null $lastname;
    public string|null $middlename;
    public string|null $phone;
    public string|null $email;
    public string|null $organization;
    public string|null $edrpou;
    public string $show = 'hidden';
    public array $check = [];
    public bool $click = false;

    public function render(): object
    {

        if(!empty($this->search) && !$this->click){
            $this->show = '';
        }

        $this->click = false;

        return view('livewire.search-clients', [
            'clients' => Client::where('lastname', 'like', $this->search.'%')
                ->orWhere('phone', 'like', '%'.$this->search.'%')->limit(10)->get()
        ]);
    }

    public function apply($client_id): void
    {

        $this->click = true;
        $this->show = 'hidden';
        $this->reset('search');

        $client = Client::find($client_id);

        $this->client_id = $client->id;
        $this->firstname = $client->firstname;
        $this->lastname = $client->lastname;
        $this->middlename = $client->middlename;
        $this->phone = $client->phone;
        $this->email = $client->email;
        $this->organization = $client->organization;
        $this->edrpou = $client->edrpou;

    }
}
