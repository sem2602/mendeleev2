@extends('layouts.app')

@section('title')Редагування даних клієнту@endsection

@section('content')
    <div class="container">

        <div class="card shadow overflow-auto">
            <div class="card-header">Редагування даних клієнту:</div>

            <div class="card-body">

                <form action="{{ route('clients.update', $client->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">І'мя:</label>
                        <input name="firstname" type="text" class="form-control" placeholder="і'мя" value="{{ $client->firstname }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Прізвище:</label>
                        <input name="lastname" type="text" class="form-control" placeholder="прізвище" value="{{ $client->lastname }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">По-батькові:</label>
                        <input name="midlename" type="text" class="form-control" placeholder="по-батькові" value="{{ $client->midlename }}">
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label">Email адреса:</label>
                        <input name="email" type="email" class="form-control" placeholder="name@example.com" value="{{ $client->email }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Телефон</label>
                        <input name="phone" type="tel" class="form-control" placeholder="+380670000000" value="{{ $client->phone }}" readonly>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label">Наіменування організації:</label>
                        <input name="organization" type="text" class="form-control" placeholder="Наіменування організації" value="{{ $client->organization }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ЄДРПОУ:</label>
                        <input name="edrpou" type="number" class="form-control" placeholder="ЄДРПОУ..." value="{{ $client->edrpou }}">
                    </div>

                    <button class="btn btn-info" type="submit">Зберегти зміни...</button>

                </form>

            </div>

        </div>
    </div>
@endsection
