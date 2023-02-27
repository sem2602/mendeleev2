@extends('layouts.app')

@section('title')Нове замовлення@endsection

@section('content')
    <div class="container">

        <div class="card shadow overflow-auto">
            <div class="card-header">
                <h5 class="mt-2">Нове замовлення:</h5>
            </div>

            <div class="card-body">

                @livewire('order-card', ['payments' => $payments])

            </div>

        </div>
    </div>
@endsection
