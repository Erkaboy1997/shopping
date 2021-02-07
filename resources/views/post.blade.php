@extends('layouts.post')
@section('content')
    <div class="currencies wow animate__flipInX" data-wow-duration="1500ms">
        <div class="left">
            <div class="currency">
                <img src="{{ asset('frontend/img/flags/usa.svg')}}" alt="">
                <span class="usd">1USD</span> = <span class="rub">@if(!empty($usd)) {{ substr($usd,0,5)  }} @endif RUB</span>
            </div>
            <div class="currency">
                <img src="{{ asset('frontend/img/flags/euro.svg')}}" alt="">
                <span class="euro">1eur</span> = <span class="rub">@if(!empty($eur)) {{ substr($eur,0,5)  }} @endif RUB</span>
            </div>
            <div class="currency">
                <img src="{{ asset('frontend/img/flags/uk.svg')}}" alt="">
                <span class="gbp">1gbp</span> = <span class="rub">@if(!empty($gbr)) {{ substr($gbr,0,5)  }} @endif RUB</span>
            </div>
        </div>
        <div class="right">
            <div class="country">Москва</div>
            <div class="weather">@if(!empty($data)) {{ $data['main']['temp'] }} @endif С</div>
        </div>
    </div>
    <div class="article">
        <div class="left">
            <img src="{{ asset('uploads')}}/{{ $new->image  }}" alt="">
        </div>
        <div class="right">
            <div class="category wow animate__fadeInLeft" data-wow-duration="1500ms">{{ $new->category  }}</div>
            <div class="title wow animate__fadeInUp" data-wow-duration="1500ms">
                {{ $new->name  }}
            </div>
            <p class="wow animate__fadeInUp" data-wow-duration="1500ms">
                {!! $new->description !!}
            </p>
        </div>
    </div>
    <div class="article-2">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 left">
                {!! $new->description_long !!}
            </div>
        </div>
    </div>

    <div class="also">
        @if(!empty($also))
        <div class="section-title wow animate__fadeInLeft" data-wow-duration="1500ms">ТАКЖЕ ЧИТАЙТЕ</div>
        <div class="items">
            @foreach($also as $value)
            <a href="{{ route('post',$value->id)  }}" class="item wow animate__fadeInLeft" data-wow-duration="1500ms">
                <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                <div class="front">
                    <div class="text">
                        <div class="title">{{ $value->category  }}</div>
                        <p>
                            {{ $value->name  }}
                        </p>
                        <div class="source">
                            <span>Источник:</span>{{ $value->source  }}
                        </div>
                    </div>
                    <div class="date-time">
                        <div class="time">{{ substr($value->day,11,5)  }}</div>
                        <div class="date">{{ substr($value->day,5,5)  }}</div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @endif

        @if(!empty($news))
        <div class="news-cards">
            @foreach($news as $value)
            <a href="{{ route('post',$value->id)  }}" class="news-card wow animate__fadeInUp" data-wow-duration="1500ms">
                <div class="image">
                    <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                </div>
                <div class="content">
                    <div class="top">
                        <div class="category">{{ $value->category  }}</div>
                        <div class="date">{{ substr($value->day,5,5)  }}</div>
                    </div>
                    <div class="title">{{ $value->name  }}</div>
                    <p>
                        {!! substr($value->description,0,40)  !!}
                    </p>
                    <div class="bottom">
                        <div class="source"><span>Источник:</span>{{ $value->source  }}</div>
                        <div class="time">{{ substr($value->day,11,5)  }}</div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @endif
    </div>
@endsection
