<div>
    <div class="row align-items-center">

        <div class="col">
            <span class="text-danger">* </span>
            <span class="h4 me-3">Замовник:</span>
        </div>

        <div class="col-12 col-md-6">
            <input wire:model="search" type="text" class="form-control border-info bg-white d-inline" placeholder="Пошук (прізвище або телефон)" value="{{ null }}">
        </div>

    </div>

    <div class="position-relative">

        <div class="position-absolute list-group bg-light w-100 m-1" {{ $show }}>
            @foreach($clients as $client)
                <button wire:click="apply({{ $client->id }})" type="button" class="list-group-item list-group-item-action bg-secondary bg-opacity-25">{{ $client->firstname }} {{ $client->lastname }}  [ {{ $client->phone }} ]</button>
            @endforeach
        </div>

        <input class="form-control mt-2" type="text" name="firstname" placeholder="Ім'я" value="{{ $firstname }}" required>
        <input class="form-control mt-2" type="text" name="lastname" placeholder="Прізвище" value="{{ $lastname }}" required>
        <input class="form-control mt-2" type="text" name="middlename" placeholder="По-батькові (необов'язково)" value="{{ $middlename }}">
        <input class="form-control mt-2" type="tel" name="phone" placeholder="+38000-000-00-00" value="{{ $phone }}" required>
        <input class="form-control mt-2" type="email" name="email" placeholder="example@mail.com" value="{{ $email }}" required>
        <hr>
        <b>Для юридичних осіб (необов'язково)</b>
        <input class="form-control mt-2" type="text" name="organization" placeholder="Організація" value="{{ $organization }}">
        <input class="form-control mt-2" type="number" name="edrpou" placeholder="ЕДРПОУ" value="{{ $edrpou }}">

    </div>
</div>


