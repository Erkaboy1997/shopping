@extends('layouts.register')
@section('content')
    <div class="content">
        <div class="left">
            <form action="{{ route('checkregister') }}" method="POST">
                {{ csrf_field() }}
                <div class="title">
                    Регистрация
                    <div class="or">или <a href="{{ url('login')  }}">Вход</a> в аккаунт</div>
                </div>
                <div class="inputs">
                    <span class="text">Ваше имя</span>
                    <input id="name" type="text"  name="name" value="{{ old('name') }}" required autofocus>
                </div>
                <div class="inputs">
                    <span class="text">Эл. почта</span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="inputs">
                    <span class="text">Пароль</span>
                    <input id="password" type="password" name="password" required>
                    <div class="button eyes">
                        <img src="{{ asset('frontend/img/icons/eye.svg')}}" alt="">
                    </div>
                </div>
                <div class="inputs">
                    <span class="text">Подтвердите свой пароль</span>
                    <input id="password-confirm" type="password"  name="password_confirmation" required>
                    <div class="button eyes">
                        <img src="{{ asset('frontend/img/icons/eye.svg')}}" alt="">
                    </div>
                </div>
                <div class="confirm">
                    <label>
                        <input type="checkbox" class="checkbox">
                        <span class="fake"></span>
                        <span class="text">Я согласен</span>
                    </label>
                    <a href="#/" class="condition-btn">с условиями использования</a>
                </div>
                <button type="submit" class="btn">
                    РЕГИСТРАЦИЯ
                </button>
            </form>
        </div>
        <div class="right">
            @php
                $image = \Illuminate\Support\Facades\DB::table('register') -> orderByDesc('id') -> first();
            @endphp

            @if(isset($image)>0)
                <img src="{{ asset('uploads')}}/{{ $image->image  }}" alt="">
            @else
                <img src="{{ asset('frontend/img/register.png')}}" alt="">
            @endif
        </div>
    </div>
@endsection
