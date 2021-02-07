@extends('layouts.category')
@section('content')

@if(!empty($mainCategory))
<div class="section-title"><span>Каталог</span></div>
<div class="container">
    <div class="catalog-tabs">
        @foreach($mainCategory as $value)
        <a href="{{ url('category',$value->id) }}" class="tab @if($value->id == $id) {{ "active"  }} @endif">{{ $value->name  }}</a>
        @endforeach
    </div>
</div>
@endif

@if(!empty($category))
<div class="catalogs">
    <div class="container">
        @foreach($category as $value)
        <div class="catalog">
            <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="{{ $value->alt  }}">
            <a href="{{ url('subcategory',$value->id)  }}" class="title">{{ $value->name  }}</a>
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection
