@extends('layouts.about')
@section('content')

    @if(!empty($we))
    <div class="banner">
        <img src="{{ asset('uploads')}}/{{ $we->image  }}" alt="">
        <img src="{{ asset('uploads')}}/{{ $we->image_mobile  }}" alt="" class="mob-tab">
        <div class="title">
            <span>{!! $we->title  !!}</span>
        </div>
    </div>
    @endif

    @if(!empty($company))
    <div class="about">
        <div class="left">
            <div class="title wow animate__fadeInLeft" data-wow-duration="1500ms">{!! $company->title  !!}</div>
            <p class="wow animate__fadeInUp" data-wow-duration="1500ms">
                {!! $company->description  !!}
            </p>
            <div class="play wow animate__fadeInUp" data-wow-duration="1500ms">
                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
                    <path d="M16.6836 28.5616V13.4384L29.7774 21L16.6836 28.5616ZM17.9961 15.7114V26.2885L27.1524 21L17.9961 15.7114Z" fill="#B57E57"/>
                    <path d="M21 42C9.3934 42 0 32.6074 0 21C0 9.39258 9.39258 0 21 0C32.6074 0 42 9.39258 42 21C42 32.6074 32.6074 42 21 42ZM21 1.3125C10.1186 1.3125 1.3125 10.1177 1.3125 21C1.3125 31.8823 10.1177 40.6875 21 40.6875C31.8823 40.6875 40.6875 31.8823 40.6875 21C40.6875 10.1177 31.8823 1.3125 21 1.3125Z" fill="#B57E57"/>
                </svg>
                Видео о проекте
            </div>
        </div>
        <div class="right">
            <img src="{{ asset('uploads')}}/{{ $company->image  }}" alt="{{ $company->alt  }}" class="wow animate__slideInRight" data-wow-duration="1000ms">
            @if(!empty($company->image_title))
            <div class="text wow animate__lightSpeedInRight" data-wow-duration="1500ms">
                <div class="title">{{ $company->image_title  }}</div>
                <p>{!! $company -> image_description  !!}</p>
            </div>
            @endif
        </div>
    </div>
    @endif


    <?php if(!empty($history)){ ?>
    <div class="history">
        <div class="left">
            <div class="swiper-container about-slider wow wow animate__fadeInLeft" data-wow-duration="1500ms">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="{{ asset('frontend/img/about-slider.png')}}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="{{ asset('frontend/img/about-slider-2.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"><img src="{{ asset('frontend/img/arrow-right.png')}}" alt=""></div>
                <div class="swiper-button-prev"><img src="{{ asset('frontend/img/arrow-left.png')}}" alt=""></div>
            </div>
            <div class="swiper-container about-small-slider wow animate__fadeInLeft" data-wow-duration="1500ms">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="{{ asset('uploads')}}/{{ $history->image2  }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="{{ asset('uploads')}}/{{ $history->image  }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="title wow animate__fadeInLeft" data-wow-duration="1500ms">{!! $history->title !!}</div>
            {!! $history->description !!}
        </div>
    </div>
    <?php  } ?>


    @if(!empty($mission))
    <div class="mission">
        <div class="section-title wow animate__fadeInDown" data-wow-duration="1500ms">
            {{ $mission->title  }}
        </div>
        <div class="content">
            <div class="text">
                <div class="title wow animate__fadeInLeft" data-wow-duration="1500ms">
                    {{ $mission->title_left  }}
                </div>
                <p class="wow animate__fadeInUp" data-wow-duration="1500ms">
                    {!! $mission->description_left  !!}
                </p>
            </div>
            <div class="image wow animate__zoomIn" data-wow-duration="1500ms">
                <img src="{{ asset('uploads')}}/{{ $mission->image  }}" alt="">
            </div>
            <div class="text">
                {!! $mission -> description_right  !!}
            </div>
        </div>
    </div>
    @endif


    <div class="personal">
        @if(!empty($stafftext))
        <div class="left">
            <div class="title wow animate__fadeInLeft" data-wow-duration="1500ms">{{ $stafftext->title  }}</div>
            {!! $stafftext->description  !!}
        </div>
        @endif

        @if(!empty($staff))
        <div class="right">
            @foreach($staff as $value)
            <div class="image wow animate__zoomIn" data-wow-duration="1500ms">
                <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                <div class="bottom">
                    <div class="name">{{ $value->name  }}</div>
                    <p class="special">{{ $value->position  }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    @if(!empty($quote))
    <div class="quotes wow animate__backInUp" data-wow-duration="1500ms">
        <div class="container">
            <div class="title">
                {{ $quote->title_one  }}
            </div>
            <p>
                {{ $quote->title_two  }}
            </p>
            <div class="name"><span></span>
                {{ $quote->title_three  }}
            <span></span></div>
        </div>
    </div>
    @endif

    @if(!empty($certificate))
    <div class="certificates">
        <div class="section-title">СЕРТИФИКАТЫ</div>
        <div class="items">
            @foreach($certificate as $value)
                <div class="item wow animate__zoomIn" data-wow-duration="1500ms">
                    <img src="{{ asset('uploads')}}/{{ $value->image }}" alt="{{ $value->alt  }}">
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="advantages">
        @if(!empty($advantagetext))
        <div class="section-title wow animate__fadeInDown" data-wow-duration="1500ms">{!! $advantagetext->title  !!}</div>
        <p class="sub-title wow animate__fadeInUp" data-wow-duration="1500ms">{{ $advantagetext -> description  }}</p>
        @endif

        @if(!empty($advantages))
        <div class="items">
            @foreach($advantages as $value)
            <div class="item">
                <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="{{ $value->alt  }}" class="wow animate__zoomIn" data-wow-duration="1500ms">
                <div class="title wow animate__fadeInUp" data-wow-duration="1500ms">
                    {!! $value->title  !!}
                </div>
                <p class="wow animate__fadeInUp" data-wow-duration="1500ms">
                    {!! $value -> description  !!}
                </p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
