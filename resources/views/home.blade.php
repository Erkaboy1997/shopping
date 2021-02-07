@extends('layouts.profile')
@section('content')
    <div class="page">
        <div class="page-links">
            <div class="info">
                    <div class="image">
                            <?php $image = Auth::user()->image; ?>
                            @if($image != 0)
                                <img id="edit-image" src="{{ asset('uploads/users')}}/{{ Auth::user()->image }}" alt="">
                            @else
                                <img id="edit-image" src="{{ asset('frontend/img/default.svg')}}" alt="">
                            @endif
                            <input user_id="{{ Auth::user()->id  }}" id="file" type="file" name="file" style="display: none;" value="">
                            <button class="edit" id="edit-image">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 16.6244V21H4.3756L17.2865 8.08898L12.9109 3.71338L0 16.6244Z" fill="white"/>
                                    <path d="M20.6594 3.06582L17.9348 0.341297C17.4797 -0.113766 16.7388 -0.113766 16.2837 0.341297L14.1484 2.47659L18.524 6.8522L20.6593 4.7169C21.1145 4.26184 21.1145 3.52088 20.6594 3.06582Z" fill="white"/>
                                </svg>
                            </button>
                    </div>
                <div class="name">
                    {{ Auth::user()->name }}
                </div>
                <div class="number">
                    @if(!empty(Auth::user()->phone))
                        {{ Auth::user()->phone  }}
                    @else
                        {{ Auth::user()->email }}
                    @endif
                </div>
            </div>
            <ul class="links">
                <li>
                    <a href="{{ url('/home')  }}" class="active">
                        <img src="{{ asset('frontend/img/icons/user.svg')}}" alt="">
                        МОЙ ПРОФИЛЬ
                    </a>
                </li>
                <li>
                    <a href="orders.html">
                        <img src="{{ asset('frontend/img/icons/clock.svg')}}" alt="">
                        МОИ ЗАКАЗЫ
                    </a>
                </li>
                <li>
                    <a href="settings.html">
                        <img src="{{ asset('frontend/img/icons/pay.svg')}}" alt="">
                        НАСТРОЙКИ ОПЛАТЫ
                    </a>
                </li>
                <li>
                    <a href="{{ url('favorite')  }}">
                        <img src="{{ asset('frontend/img/icons/heart.svg')}}" alt="">
                        ИЗБРАННЫЕ ТОВАРЫ
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <img src="{{ asset('frontend/img/icons/logout.svg')}}" alt="">
                        ВЫЙТИ
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

       <?php
        $user = Auth::user();
        ?>




        <div class="right">
            @if(session('success'))
                <div class="alert alert-success" role="alert" style="margin-bottom: 10px; color: blue">
                    {{ session('success')  }}
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning" role="alert" style="margin-bottom: 10px; color: red">
                    {{ session('warning')  }}
                </div>
            @endif
            <form action="{{route('user.update')}}" method="POST">

                @csrf
                <input type="hidden" name="user" value="{{ $user->id  }}">
                <div class="forms">
                    <div class="inputs">
                        <span class="text">Имя</span>
                        <input type="text" name="name" value="@if(!empty(Auth::user()->name)) {{ Auth::user()->name }} @endif">
                        <div class="button">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 16.6244V21H4.3756L17.2865 8.08898L12.9109 3.71338L0 16.6244Z" fill="white"/>
                                <path d="M20.6594 3.06582L17.9348 0.341297C17.4797 -0.113766 16.7388 -0.113766 16.2837 0.341297L14.1484 2.47659L18.524 6.8522L20.6593 4.7169C21.1145 4.26184 21.1145 3.52088 20.6594 3.06582Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                    <div class="inputs">
                        <span class="text">Пароль</span>
                        <input type="password" name="old_password">
                    </div>
                    <div class="inputs">
                        <span class="text">Фамилия</span>
                        <input type="text" name="surname" value="{{ Auth::user()->surname  }}">
                        <div class="button">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 16.6244V21H4.3756L17.2865 8.08898L12.9109 3.71338L0 16.6244Z" fill="white"/>
                                <path d="M20.6594 3.06582L17.9348 0.341297C17.4797 -0.113766 16.7388 -0.113766 16.2837 0.341297L14.1484 2.47659L18.524 6.8522L20.6593 4.7169C21.1145 4.26184 21.1145 3.52088 20.6594 3.06582Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                    <div class="inputs">
                        <span class="text">Новый пароль</span>
                        <input type="password" name="new_password">
                    </div>
                    <div class="inputs">
                        <span class="text">Эл. почта</span>
                        <input type="email" value="@if(!empty(Auth::user()->email)) {{ Auth::user()->email }} @endif">
                        <div class="button">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 16.6244V21H4.3756L17.2865 8.08898L12.9109 3.71338L0 16.6244Z" fill="white"/>
                                <path d="M20.6594 3.06582L17.9348 0.341297C17.4797 -0.113766 16.7388 -0.113766 16.2837 0.341297L14.1484 2.47659L18.524 6.8522L20.6593 4.7169C21.1145 4.26184 21.1145 3.52088 20.6594 3.06582Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                    <div class="inputs">
                        <span class="text">Подтвердить новый пароль</span>
                        <input type="password" name="confirm_password">
                    </div>
                    <div class="inputs">
                        <span class="text">Номер телефона</span>
                        <input type="text" name="phone" value="{{ Auth::user()->phone  }}">
                        <div class="button">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 16.6244V21H4.3756L17.2865 8.08898L12.9109 3.71338L0 16.6244Z" fill="white"/>
                                <path d="M20.6594 3.06582L17.9348 0.341297C17.4797 -0.113766 16.7388 -0.113766 16.2837 0.341297L14.1484 2.47659L18.524 6.8522L20.6593 4.7169C21.1145 4.26184 21.1145 3.52088 20.6594 3.06582Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <button type="submit">СОХРАНИТЬ</button>
            </form>
        </div>
    </div>
@endsection
