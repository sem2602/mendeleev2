<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class SearchClients extends Component
{
    public $search = '';
    public $client_id;
    public $firstname;
    public $lastname;
    public $middlename;
    public $phone;
    public $email;
    public $organization;
    public $edrpou;
    public $show = 'hidden';
    public $check = [];
    public $click = false;

    public function render()
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

    public function apply($client_id)
    {

        $this->click = true;
        $this->show = 'hidden';

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
