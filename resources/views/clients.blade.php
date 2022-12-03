@extends('layouts.app')

@section('title')Клієнти@endsection

@section('content')
    <div class="container">

        <div class="card shadow overflow-auto">

            <div class="card-header">
                <h5 class="mt-2">Клієнти:</h5>
            </div>

            <div class="card-body">

                @if($clients->total() > 0)
                    <table class="table table-hover align-middle">

                        <thead class="table-info">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">ФІО</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">email</th>
                            <th scope="col">Створений</th>
                            <th scope="col">Дії</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($clients as $client)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex">
                                        {{ $client->id }}
                                    </div>

                                </th>

                                <td>
                                    {{ $client->firstname }} {{ $client->lastname }}
                                </td>

                                <td style="max-width: 250px">{{ $client->phone }}</td>

                                <td>{{ $client->email }}</td>

                                <td class="text-wrap">
                                    {{ $client->created_at }}
                                </td>

                                <td class="d-flex">

                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-secondary btn-sm me-1">
                                        <i class="bi-gear"></i>
                                    </a>

{{--                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}

{{--                                        <button type="submit" class="btn btn-danger btn-sm">--}}
{{--                                            <i class="bi-x-circle"></i>--}}
{{--                                        </button>--}}

{{--                                    </form>--}}


                                </td>

                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                @else
                    <div class="alert alert-info" role="alert">
                        Клієнти в базі відсутні!
                    </div>
                @endif

            </div>

            <div class="d-flex justify-content-center">
                {!! $clients->links() !!}
            </div>

        </div>
    </div>
@endsection
