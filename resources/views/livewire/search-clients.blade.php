<div class="position-relative">

    <input class="form-control mt-3" type="text" name="firstname" placeholder="Ім'я" value="{{ $firstname }}" required>

    <div class="input-group mt-3">
        <input class="form-control" type="text" name="lastname" placeholder="Прізвище" value="{{ $lastname }}" required>
        <input wire:model="search" type="text" class="input-group-text ms-1" placeholder="Пошук (прізвище або телефон)" value="{{ null }}">
    </div>

    <div class="position-absolute list-group bg-light w-100 mt-1" {{ $show }}>
        @foreach($clients as $client)
            <button wire:click="apply({{ $client->id }})" type="button" class="list-group-item list-group-item-action bg-secondary bg-opacity-25">{{ $client->firstname }} {{ $client->lastname }}</button>
        @endforeach
    </div>

    <input class="form-control mt-3" type="text" name="middlename" placeholder="По-батькові (необов'язково)" value="{{ $middlename }}">

    <input class="form-control mt-3" type="tel" name="phone" placeholder="+38000-000-00-00" value="{{ $phone }}" required>


    <input class="form-control mt-3" type="email" name="email" placeholder="example@mail.com" value="{{ $email }}" required>

    <hr>

    <b>Для юридичних осіб (необов'язково)</b>
    <input class="form-control mt-3" type="text" name="organization" placeholder="Організація" value="{{ $organization }}">
    <input class="form-control mt-3" type="number" name="edrpou" placeholder="ЕДРПОУ" value="{{ $edrpou }}">

</div>
