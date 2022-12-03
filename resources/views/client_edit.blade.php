@extends('layouts.app')

@section('title')Редагування даних клієнту@endsection

@section('content')
    <div class="container">

        <div class="card shadow overflow-auto">
            <div class="card-header">
                <h5 class="mt-2">Редагування даних клієнту:</h5>
            </div>

            <div class="card-body">

                <div class="row justify-content-center">
                    <div class="col-md-6 border-info border-start">
                        <form action="{{ route('clients.update', $client->id) }}" method="POST">

                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label"><b>Ім'я:</b></label>
                                <input name="firstname" type="text" class="form-control" placeholder="і'мя" value="{{ $client->firstname }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><b>Прізвище:</b></label>
                                <input name="lastname" type="text" class="form-control" placeholder="прізвище" value="{{ $client->lastname }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><b>По-батькові:</b></label>
                                <input name="midlename" type="text" class="form-control" placeholder="по-батькові" value="{{ $client->midlename }}">
                            </div>

                            <hr>

                            <div class="mb-3">
                                <label class="form-label"><b>Email адреса:</b></label>
                                <input name="email" type="email" class="form-control" placeholder="name@example.com" value="{{ $client->email }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><b>Телефон</b></label>
                                <input name="phone" type="tel" class="form-control" placeholder="+380670000000" value="{{ $client->phone }}" readonly>
                            </div>

                            <hr>

                            <div class="mb-3">
                                <label class="form-label"><b>Наіменування організації:</b></label>
                                <input name="organization" type="text" class="form-control" placeholder="Наіменування організації" value="{{ $client->organization }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><b>ЄДРПОУ:</b></label>
                                <input name="edrpou" type="number" class="form-control" placeholder="ЄДРПОУ..." value="{{ $client->edrpou }}">
                            </div>

                            <button class="btn btn-info" type="submit">Зберегти зміни...</button>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
