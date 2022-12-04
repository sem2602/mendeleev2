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

                    <div class="row">

                        <div class="col-md-6 border-start border-info">
                            <span class="text-danger">* </span>
                            <span class="h4">Замовник:</span>

                            <input class="form-control mt-3" type="text" name="firstname" placeholder="Ім'я" required>
                            <input class="form-control mt-3" type="text" name="lastname" placeholder="Прізвище" required>
                            <input class="form-control mt-3" type="text" name="middlename" placeholder="По-батькові (необов'язково)">
                            <input class="form-control mt-3" type="tel" name="phone" placeholder="+38000-000-00-00" required>
                            <input class="form-control mt-3" type="email" name="email" placeholder="example@mail.com" required>

                            <hr>

                            <b>Для юридичних осіб (необов'язково)</b>
                            <input class="form-control mt-3" type="text" name="organization" placeholder="Організація">
                            <input class="form-control mt-3" type="number" name="edrpou" placeholder="ЕДРПОУ">
                        </div>

                        <div class="col-md-6 border-start border-info">
                            <span class="text-danger">* </span>
                            <span class="h4">Доставка:</span>

                            <p class="mb-2"></p>
                            <p class="mb-2"></p>
                        </div>

                    </div>

                    <hr>

                    <div class="p-3 mb-3">
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
