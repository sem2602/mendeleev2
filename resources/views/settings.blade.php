@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">Налаштування</div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                <div class="row justify-content-center">

                    <div class="col-sm-12 col-md-10 col-lg-8">

                        @foreach($settings as $setting)
                            <div class="mb-3 p-3 border border-info">
                                <label class="form-label">{{ $setting->name }} | {{ $setting->key }}</label>
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control" value="{{ $setting->value }}" disabled>
                                    <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Видалити</button>
                                </div>
                            </div>
                        @endforeach

                        <div class="mb-3">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addModal">Додати сервіс</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- deleteModal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- addModal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border border-info rounded">





                <form action="{{ route('settings.add') }}" method="POST">

                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Додати значення сервісу</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Сервіс</label>
                            <select name="service" class="form-select">
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ключ сервісу</label>
                            <select name="key" class="form-select">
                                <option value="login">login</option>
                                <option value="password">password</option>
                                <option value="bearer">bearer</option>
                                <option value="token">token</option>
                                <option value="api">api</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Значення сервісу</label>
                            <input name="value" type="text" class="form-control" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                        <button type="submit" class="btn btn-primary">Додати значення</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
