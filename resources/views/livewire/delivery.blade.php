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


    @if($delivery_method == 1)
        <input class="form-control mt-2" type="text" name="city" placeholder="Місто доставки..." value="" required>
    @else
        2
    @endif



</div>
