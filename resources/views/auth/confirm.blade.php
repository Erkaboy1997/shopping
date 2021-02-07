@extends('layouts.confirm')
@section('content')

<div class="content">
    <div class="left">
        <div class="confirm-text">
            Мы отправмлм вам письмо. <br>
            Пожалуйста, проверьте вашу почту
        </div>
    </div>
    <div class="right">
        <img src="{{ asset('frontend/img/log-in.png')}}" alt="">
    </div>
</div>
@endsection
