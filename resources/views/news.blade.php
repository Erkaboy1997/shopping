@extends('layouts.main')
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

    @if(!empty($news))
    <div class="news">
        <div class="container" id="result-show-news">
            <div class="top">
                <div class="title wow animate__fadeInLeft" data-wow-duration="1500ms">НОВОСТИ</div>
            </div>
            @foreach($news as $value)
            <a href="{{ route('post',$value->id)  }}" class="new wow animate__fadeInUp" data-wow-duration="1500ms">
                <div class="title">
                    {{ $value->name  }}
                </div>
                <div class="bottom">
                    <div class="date">
                        {{ substr($value->day,0,10)  }}
                    </div>
                    <div class="source"><span>Источник:</span>
                        @if(!empty($value->source))
                            {{ $value->source  }}
                        @endif
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="show-more" id="show-news" value="0">
            показать Еще
        </div>
    </div>
    @endif

@endsection
