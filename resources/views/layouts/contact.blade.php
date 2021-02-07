<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <?php
    $head = \Illuminate\Support\Facades\DB::table('head') -> orderByDesc('id') -> where('status',1) -> get();
    if(count($head)>0){
    foreach($head as $value){
    ?>
    {!!  $value->name  !!}
    <?php
    }
    }
    ?>
    @include('partials.meta')
    <title>XO TEXTILE</title>
    @include('partials.link')
</head>
<body>
    <div class="contacts-page">
        @include('partials.header')
        @yield('content')
    </div>
    @include('partials.script')
</body>
</html>
