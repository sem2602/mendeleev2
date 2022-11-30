@extends('layouts.app')

@section('title')Прийняті замовлення@endsection

@section('content')
    <div class="container">

        <div class="card shadow overflow-auto">
            <div class="card-header">Прийняті замовлення:</div>

            <div class="card-body">

                @if($orders->total() > 0)
                    <table class="table table-hover align-middle">

                        <thead class="table-info">
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Замовник</th>
                            <th scope="col">Доставка</th>
                            <th scope="col">Тип платежу</th>
                            <th scope="col">Сума</th>
                            <th scope="col">Прийнятий</th>
                            <th scope="col">Дії</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex">
                                        <div>
                                            @if($order->setting->service_id == 2)
                                                <i class="prom-icon-17"></i>
                                            @elseif($order->setting->service_id == 1)
                                                <i class="mm-icon-17"></i>
                                            @endif
                                        </div>

                                        <div class="d-flex flex-column ms-1">
                                            <small>{{ $order->setting->setting_name }}</small>
                                            <span>{{ $order->ext_id }}</span>
                                        </div>

                                    </div>

                                </th>

                                <td>
                                    <div>
                                        {{ $order->client->firstname }} {{ $order->client->lastname }}
                                    </div>
                                    <div>
                                        {{ $order->client->phone }}
                                    </div>

                                </td>

                                <td style="max-width: 250px">{{ $order->recipient_address }}</td>

                                <td>{{ $order->payment->name }}</td>

                                <td class="text-wrap">
                                    {{ $order->total . ' грн.' }}
                                </td>

                                <td>{{ $order->created_at }}</td>

                                <td class="text-nowrap">

                                    <a href="{{ route('confirm.order', ['id' => $order->id]) }}" class="btn btn-success btn-sm">
                                        <i class="bi-check"></i>
                                    </a>

                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi-x-circle"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                @else
                    <div class="alert alert-info" role="alert">
                        Замовлення на даний час відсутні!
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection

