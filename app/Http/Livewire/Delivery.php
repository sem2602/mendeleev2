<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\NovaPoshta;
use App\Http\Controllers\Services\Ukrpost;
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

        $clients = match ($this->delivery_provider) {
            1 => $this->getNovaPoshtaCities(),
            2 => $this->getUkrpostCities(),
            3 => 'justin',
            default => throw new \Exception('Unexpected match value'),
        };

        //dd($clients);



        return view('livewire.delivery', ['cities' => $clients]);
    }

    public function refresh(): void
    {
        $this->reset('search', 'warehouses', 'show', 'showList');
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

        $this->warehouses = match ($this->delivery_provider) {
            1 => $this->getNovaPoshtaWarehouses($city_ref),
            2 => $this->getUkrpostWarehouses($city_ref),
            3 => [],//'justin'
            default => throw new \Exception('Unexpected match value'),
        };

    }

    private function getNovaPoshtaCities(): array
    {
        $np = new NovaPoshta($this->np_api);

        $cities = $np->searchCity($this->search);

        //dd($cities);

        if(!$cities['success']){
            $cities['data'][0]['Addresses'] = [];
        }
        $data = [];
        foreach ($cities['data'][0]['Addresses'] as $key =>$city){
            $data[$key]['city'] = $city['Present'];
            $data[$key]['city_ref'] = $city['Ref'];
        }

        return $data;

    }

    private function getNovaPoshtaWarehouses($city_ref): array
    {
        $np = new NovaPoshta($this->np_api);
        $data = $np->getWarehouses($city_ref);

        if($data['success']){
            return $data['data'];
        }

        return [];
    }

    private function getUkrpostCities(): array
    {
        $ukrpost = new Ukrpost($this->bearer, $this->token);
        if (!empty($this->search)){
            $cities = $ukrpost->getCitiesLikeName($this->search);
        } else {$cities = [];}

        $data = [];
        if(!empty($cities['data']['cities'])){
            foreach ($cities['data']['cities'] as $key => $city){
                $data[$key]['city'] = $city['text'];
                $data[$key]['city_ref'] = $city['value'];
                if($key > 9){break;}
            }
        }

        return $data;

    }

    private function getUkrpostWarehouses($city_ref): array
    {
        $ukrpost = new Ukrpost($this->bearer, $this->token);
        $warehouses = $ukrpost->getDepByCityRef($city_ref);
        //dd($data);

        $data = [];
        if(!empty($warehouses['data']['warehouses'])){
            foreach ($warehouses['data']['warehouses'] as $key => $warehouse){
                $data[$key]['Description'] = $warehouse['text'];
                $data[$key]['Ref'] = $warehouse['value'];
            }
        }
        return $data;
    }

}
