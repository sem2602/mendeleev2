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



                <form action="{{ route('order.create') }}" method="POST">

                    @csrf

                    <span class="text-danger">* </span>
                    <span class="h4">Замовник:</span>
                    <div class="p-3 mb-3">

                        <input type="text" name="firstname" placeholder="">
                        <input type="text" name="lastname" placeholder="">
                        <input type="text" name="middlename" placeholder="">
                        <input type="tel" name="phone" placeholder="">
                        <input type="email" name="email" placeholder="">

                        <hr>

                        <strong>Доставка:</strong>
                        <p class="mb-2"></p>
                        <p class="mb-2"></p>

                        <hr>
                        <p class="mb-2 p-3" style="background-color: #a9f8b4">Замовлення на суму: <em><b></b></em></p>

                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <select class="form-select" name="payment_id">
                                @foreach($payments as $payment)
                                    <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Прийняти замовлення...</button>

                </form>

            </div>

        </div>
    </div>
@endsection
