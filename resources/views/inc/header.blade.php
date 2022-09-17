@section('header')
    <header class="border border-info">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="navbar-brand ms-3">
                    <span href="/">MendeleevPanel</span>
                    <small>v2.0</small>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between ms-3" id="navbarSupportedContent">

                    <ul class="navbar-nav">
                        <li class="nav-item me-2">
                            <a class="nav-link" href="/">Головна</a>
                        </li>

                        <li class="nav-item dropdown me-2">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Замовлення</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/orders/create">Нове замовлення</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="/orders/accepted">Прийняті</a></li>
                                <li><a class="dropdown-item" href="/orders/active">Активні</a></li>
                                <li><a class="dropdown-item" href="/orders/cod">Накладені платежі</a></li>
                                <li><a class="dropdown-item" href="/orders">Всі зімовлення</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="/registers">Реєстри</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="/orders/calls">Прозвон замовлень</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown me-2">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Платежі</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/payments/privat24">Privat24</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown me-2">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Товари</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/products">Список товарів</a></li>
                                <li><a class="dropdown-item" href="/sets">Список наборів</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="/products/create">Новий товар</a></li>
                                <li><a class="dropdown-item" href="/sets/create">Новий набір</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="/inventory">Інвентаризація</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Інше</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/marking">Маркування</a></li>
                                <li><a class="dropdown-item" href="/maxi-marking">Маркування Maxi</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="/clients">Клієнти</a></li>
                                <li><a class="dropdown-item" href="/users">Користувачі</a></li>
                                <li><a class="dropdown-item" href="/blacklist">Чорний список</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="/history">Історія</a></li>
                                <li><a class="dropdown-item" href="/storage_history">Складська історія</a></li>
                                <li><a class="dropdown-item" href="/settings">Налаштування</a></li>
                            </ul>
                        </li>


                    </ul>

                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Вийти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </div>

            </div>
        </nav>
    </header>

