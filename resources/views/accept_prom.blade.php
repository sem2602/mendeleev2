@extends('layouts.app')

@section('title')Прийняти замовлення@endsection

@section('content')
    <div class="container">

        <div class="card shadow overflow-auto">
            <div class="card-header">Замовлення з сайту пром:  {{ $order_title }}  №{{ $order['id'] }}</div>

            <div class="card-body">

                <span class="text-danger">* </span>
                <span class="h4">Товари в кошику</span>

            </div>

        </div>
    </div>
@endsection
