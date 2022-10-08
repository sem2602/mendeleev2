@extends('layouts.app')

@section('title')Головна@endsection

@section('content')
<div class="container">

    <div class="card shadow overflow-auto">
        <div class="card-header">Замовлення з сайтів</div>

        <div class="card-body">

            @if(!empty($orders))
                <table class="table table-hover align-middle">

                    <thead class="table-info">
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Замовник</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Сума</th>
                        <th scope="col">Оплата</th>
                        <th scope="col">Створений</th>
                        <th scope="col">Дії</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">
                                <div class="d-flex">
                                    <div>
                                        @if($order['service_id'] == 2)
                                            <i class="prom-icon-17"></i>
                                        @elseif($order['service_id'] == 1)
                                            <i class="mm-icon-17"></i>
                                        @endif
                                    </div>

                                    <div class="d-flex flex-column ms-1">
                                        <small>{{ $order['service_name'] }}</small>
                                        <span>{{ $order['id'] }}</span>
                                    </div>

                                </div>

                            </th>

                            <td>{{ $order['client_first_name'] }} {{ $order['client_last_name'] }}</td>
                            <td>{{ $order['phone'] }}</td>
                            <td><em>{{ $order['price'] }}</em></td>
                            <td class="text-wrap">
                                {{ $order['payment_type'] }}
                                @if($order['payment'])
                                    <br><em class="px-2 bg-success bg-opacity-50">Сплачено!</em>
                                @endif
                            </td>
                            <td>{{ $order['created'] }}</td>
                            <td class="text-nowrap">

                                @if($order['service_id'] == 1)
                                    <a href="/order.accept.site/{{ $order['id'] }}" class="btn btn-success btn-sm">
                                        <i class="bi-check"></i>
                                    </a>
                                @else
                                    <a href="/order.accept.prom/{{ $order['id'] }}" class="btn btn-success btn-sm">
                                        <i class="bi-check"></i>
                                    </a>
                                @endif


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
