<div>

    <div class="row align-items-center">

        <div class="col">
            <span class="text-danger">* </span>
            <span class="h4">Доставка:</span>
        </div>

        <div class="col-auto">
            <div class="form-check-inline ms-3">
                <div class="form-check form-check-inline">
                    <input wire:model="delivery_provider" wire:click="refresh" class="form-check-input my-2" type="radio" name="delivery_provider" value="1" checked>
                    <i class="novaposhta-icon"></i>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model="delivery_provider" wire:click="refresh" class="form-check-input my-2" type="radio" name="delivery_provider" value="2">
                    <i class="ukrposhta-icon"></i>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model="delivery_provider" wire:click="refresh" class="form-check-input my-2" type="radio" name="delivery_provider" value="3" disabled>
                    <i class="justin-icon"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="input-group mt-2">
        <label class="input-group-text">Тип доставки:</label>
        <select wire:model="delivery_method" class="form-select" name="payment_id">
            <option value="1">У відділення</option>
            <option value="2">Кур'єром</option>
        </select>
    </div>

{{--    @json($show)--}}

    <div class="position-relative">
        <input wire:model="search" wire:focus="showCityList" class="form-control mt-2" type="text" name="city" placeholder="Місто доставки..." value="" required>
        <input type="text" name="city_ref" value="{{ $cityRef }}" hidden>

        <div class="position-absolute list-group bg-light w-100 m-1" {{ $show }}>
            @foreach($cities as $city)
                <button wire:click="select('{{$city['city_ref']}}', '{{$city['city']}}')" type="button" class="list-group-item list-group-item-action bg-secondary bg-opacity-25">{{ $city['city'] }}</button>
            @endforeach
        </div>

    </div>

    @if($delivery_method == 1)

        <select class="form-select mt-2" name="warehouse_ref" {{$showList}} required>
            @foreach($warehouses as $warehouse)
                <option value="{{ $warehouse['Ref'] }}">{{ $warehouse['Description'] }}</option>
            @endforeach
        </select>
    @else
        <input class="form-control mt-2" type="text" name="street" value="{{ old('street') }}" placeholder="Вулиця..." required>
        <input class="form-control mt-2" type="text" name="house" value="{{ old('house') }}" placeholder="№ будинку..." required>
        <input class="form-control mt-2" type="number" name="flat" value="{{ old('flat') }}" placeholder="№ квартири (не обов'язково)">
    @endif



</div>
