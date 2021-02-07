@extends('layouts.login')
@section('content')
    <div class="content">
        <div class="left">
            <form method="POST" action="{{ route('checklogin') }}">
                @csrf
                <div class="title">
                    Вход
                    <div class="or">или <a href="{{ route('register') }}">Регистрация</a></div>
                </div>

                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message  }}</strong>
                    </div>
                @endif
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors -> all() as $error)
                                <li>{{ $error  }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="inputs">
                    <span class="text">Эл. почта</span>
                    <input type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="inputs">
                    <span class="text">Ваш Пароль</span>
                    <input type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <div class="button eyes">
                        <img src="{{ asset('frontend/img/icons/eye.svg')}}" alt="">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="confirm">
                    <label>
                        <input type="checkbox" class="checkbox">
                        <span class="fake"></span>
                        <span class="text">Запомнить меня</span>
                    </label>
                    <a href="{{ route('forget') }}" class="forget">Забыли пароль?</a>
                </div>
                <button type="submit" class="btn">
                    Вход
                </button>
            </form>
        </div>
        <div class="right">
            @php
                $image = \Illuminate\Support\Facades\DB::table('login') -> orderByDesc('id') -> first();
            @endphp

            @if(!empty($image)>0)
                <img src="{{ asset('uploads')}}/{{ $image->image  }}" alt="">
            @else
                <img src="{{ asset('frontend/img/log-in.png')}}" alt="">
            @endif
        </div>
    </div>

@endsection
