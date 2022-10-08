@extends('layouts.app')

@section('title')Прийняти замовлення@endsection

@section('content')
    <div class="container">

        <div class="card shadow overflow-auto">
            <div class="card-header">Замовлення з сайту пром:  {{ $order_title }}  №{{ $order['id'] }}</div>

            <div class="card-body">



            </div>

        </div>
    </div>
@endsection
