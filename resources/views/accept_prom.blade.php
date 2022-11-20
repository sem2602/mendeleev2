@extends('layouts.app')

@section('title')Прийняти замовлення@endsection

@section('content')
    <div class="container">

        <div class="card shadow overflow-auto">
            <div class="card-header">
                <span>Замовлення з сайту пром:  </span>
                <span><i class="prom-icon-17"></i></span>
                <span><strong>{{ $order_title }}  №{{ $order['id'] }}</strong></span>
            </div>

            <div class="card-body">

                <span class="text-danger">* </span>
                <span class="h4">Товари в кошику</span>
                <div class="p-3 mb-3" style="background-color: #c5d9f5">
                    @foreach($order['products'] as $product)
                        @if($product['not_found'])
                            <p class="text-danger mb-2">Товар <em>"{{ $product['not_found'] }}" </em>в системі не знайдено!</p>
                        @else
                            <p class="mb-2">{{ $product['name'] }} - <em>{{ $product['quantity'] }}</em></p>
                        @endif
                    @endforeach
                </div>

                <span class="text-danger">* </span>
                <span class="h4">Замовник:</span>
                <div class="p-3 mb-3">

                    <p class="mb-2">{{ $order['client_first_name'] }} {{ $order['client_last_name'] }}</p>
                    <p class="mb-2">{{ $order['phone'] }}</p>
                    <p class="mb-2">{{ $order['email'] }}</p>

                    <hr>
                    <strong>Доставка:</strong>
                    <p class="mb-2">{{ $order['delivery_name'] }}</p>
                    <p class="mb-2">{{ $order['delivery_address'] }}</p>

                    <hr>
                    <p class="mb-2 p-3" style="background-color: #a9f8b4">Замовлення на суму: <em><b>{{ $order['price'] }}</b></em></p>

                </div>

                <form action="{{ route('order.prom.accept') }}" method="POST">

                    @csrf

                    <input type="text" name="order_id" value="{{ $order['id'] }}" hidden>
                    <input type="text" name="setting_id" value="{{ $order['setting_id'] }}" hidden>

                    <button type="submit" class="btn btn-success">Прийняти замовлення...</button>

                </form>

            </div>

        </div>
    </div>
@endsection
