@extends('layouts.app')

@section('title')Нове замовлення@endsection

@section('content')
    <div class="container">

        <div class="card shadow overflow-auto">
            <div class="card-header">
                <h5 class="mt-2">Нове замовлення:</h5>
            </div>

            <div class="card-body">

                <span class="text-danger">* </span>
                <span class="h4">Товари в кошику</span>
                <div class="p-3 mb-3" style="background-color: #c5d9f5">

                </div>



                <form action="{{ route('save.create.order') }}" method="POST">

                    @csrf

                    <div class="row mb-3">

                        @livewire('search-clients')

                        <div class="col-md-6 border-start border-info">
                            <span class="text-danger">* </span>
                            <span class="h4">Доставка:</span>

                            <p class="mb-2"></p>
                            <p class="mb-2"></p>
                        </div>

                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="input-group-text">Тип розрахунку:</label>
                                <select class="form-select" name="payment_id">
                                    @foreach($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="mb-2 p-3" style="background-color: #a9f8b4">Замовлення на суму: <em><b></b></em></p>
                    </div>



                    <button type="submit" class="btn btn-success">Прийняти замовлення...</button>

                </form>

            </div>

        </div>
    </div>
@endsection
