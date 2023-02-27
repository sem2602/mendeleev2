<div>
    <span class="text-danger">* </span>
    <span class="h4">Товари в кошику</span>
    <div class="p-3 mb-3" style="background-color: #c5d9f5">

    </div>



    <form action="{{ route('save.create.order') }}" method="POST">

        @csrf

        <div class="row mb-3">

            <div class="col-md-6 border-start border-info mb-3">
                @livewire('search-clients')
            </div>


            <div class="col-md-6 border-start border-info mb-3">

                @if($payment_id == 1 || $payment_id == 2)
                    @livewire('delivery')
                @else
                    <div class="row h-75 justify-content-center align-items-center">
                        <img src='{{ asset('build/assets/delivery.png') }}' class="w-50">
                    </div>
                @endif

            </div>

        </div>

        <hr>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text">Тип розрахунку:</label>
                    <select wire:model="payment_id" class="form-select" name="payment_id">
                        @foreach($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

{{--        <div> @json($payment_id) </div>--}}

        <div class="mb-3">
            <p class="mb-2 p-3" style="background-color: #a9f8b4">Замовлення на суму: <em><b></b></em></p>
        </div>



        <button type="submit" class="btn btn-success">Прийняти замовлення...</button>

    </form>
</div>
