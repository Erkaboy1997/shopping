<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <?php
    $head = \Illuminate\Support\Facades\DB::table('head') -> orderByDesc('id') -> where('status',1) -> get();
    if(count($head)>0){
    foreach($head as $value){
    ?>
    {!! $value->name  !!}
    <?php
    }
    }
    ?>
    @include('partials.meta')
    <title>XO TEXTILE</title>
    @include('partials.link')
    <style>
        *::-webkit-scrollbar,
        div::-webkit-scrollbar {
            width: 0;
        }
    </style>
</head>
<body>
<div class="status-page">
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
</div>
@include('partials.script')
</body>
</html>
