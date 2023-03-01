<div>

    <div class="row align-items-center">

        <div class="col">
            <span class="text-danger">* </span>
            <span class="h4">Доставка:</span>
        </div>

        <div class="col-auto">
            <div class="form-check-inline ms-3">
                <div class="form-check form-check-inline">
                    <input wire:model="delivery_provider" class="form-check-input my-2" type="radio" name="delivery_provider" value="1" checked>
                    <i class="novaposhta-icon"></i>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model="delivery_provider" class="form-check-input my-2" type="radio" name="delivery_provider" value="2">
                    <i class="ukrposhta-icon"></i>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model="delivery_provider" class="form-check-input my-2" type="radio" name="delivery_provider" value="3">
                    <i class="justin-icon"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="input-group mt-2">
        <label class="input-group-text">Тип доставки:</label>
        <select wire:model="delivery_method" class="form-select" name="payment_id">
            <option value="1">Відділення</option>
            <option value="2">Адресна доставка</option>
        </select>
    </div>

{{--    @json($show)--}}


    @if($delivery_method == 1)
        <div class="position-relative">
            <input wire:model="search" wire:focus="showCityList" class="form-control mt-2" type="text" name="city" placeholder="Місто доставки..." value="" required>
            <input type="text" name="city_ref" value="{{ $cityRef }}" hidden>

            <div class="position-absolute list-group bg-light w-100 m-1" {{ $show }}>
                @foreach($cities as $city)
                    <button wire:click="select('{{$city['Ref']}}', '{{$city['Present']}}')" type="button" class="list-group-item list-group-item-action bg-secondary bg-opacity-25">{{ $city['Present'] }}</button>
                @endforeach
            </div>

        </div>

        <select class="form-select mt-2" name="warehouse_ref" {{$showList}} required>
            @foreach($warehouses as $warehouse)
                <option value="{{ $warehouse['Ref'] }}">{{ $warehouse['Description'] }}</option>
            @endforeach
        </select>
    @else
        2
    @endif



</div>
