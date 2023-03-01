<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\NovaPoshta;
use App\Models\DeliveryProvider;
use App\Models\Settings;
use Livewire\Component;

class Delivery extends Component
{

    public int $delivery_method = 1;
    public int $delivery_provider = 1;
    // NOVA POSHTA
    public string $np_api = '';
    // UKRPOST
    public string $bearer = '';
    public string $token = '';

    public string $show = 'hidden';
    public bool $click = false;
    public string $search = '';
    public string $cityRef = '';
    public string $showList = 'hidden';
    public array $warehouses = [];


    public function mount()
    {

        $this->np_api = Settings::where(['service_id' => DeliveryProvider::find(1)->service_id])->value('value');
        $this->bearer = Settings::where(['key' => 'bearer', 'service_id' => DeliveryProvider::find(2)->service_id])->value('value');
        $this->token = Settings::where(['key' => 'token', 'service_id' => DeliveryProvider::find(2)->service_id])->value('value');

    }

    public function render(): object
    {

        $np = new NovaPoshta($this->np_api);

        $cities = $np->searchCity($this->search);

        //dd($cities);

        if(!$cities['success']){
            $cities['data'][0]['Addresses'] = [];
        }

        return view('livewire.delivery', ['cities' => $cities['data'][0]['Addresses']]);
    }

    public function showCityList()
    {
        $this->show = '';
    }

    public function select($city_ref, $city): void
    {

        $this->click = true;
        $this->cityRef  = $city_ref;
        $this->search = $city;
        $this->show = 'hidden';

        $this->showList = '';

        $np = new NovaPoshta($this->np_api);
        $data = $np->getWarehouses($city_ref);

        if($data['success']){
            $this->warehouses = $data['data'];
        }

        //dd($data);


    }
}
