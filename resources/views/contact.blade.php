@extends('layouts.contact')
@section('content')
    @if(!empty($contact))
    <div class="content">
        <div class="left">
            <img src="{{ asset('uploads')}}/{{ $contact->image_left }}" alt="{{ $contact->alt  }}">
        </div>
        <div class="right">
            <div class="box">
                <div class="title"><span>{{ $contact -> title  }}</span></div>
                <div class="item">
                    <div class="icon">
                        <img src="{{ asset('frontend/img/icons/telephone.svg')}}" alt="{{ $contact->alt  }}">
                    </div>
                    <div class="text">
                        <div class="numbers">
                            <a href="{{ $contact->phone_first  }}">
                                {{ substr($contact->phone_first,0,2) }} {{ substr($contact->phone_first,2,3) }} {{ substr($contact->phone_first,5,3)  }}-{{ substr($contact->phone_first,8,2)  }}-{{ substr($contact->phone_first,10,2)  }}
                            </a>
                            <a href="{{ $contact->phone_second  }}">
                                {{ substr($contact->phone_second,0,2) }} {{ substr($contact->phone_second,2,3) }} {{ substr($contact->phone_second,5,3)  }}-{{ substr($contact->phone_second,8,2)  }}-{{ substr($contact->phone_second,10,2)  }}
                            </a>
                        </div>
                        <span>
                            {{ $contact->work_hours  }}
                        </span>
                    </div>
                </div>
                <div class="item">
                    <div class="icon">
                        <img src="{{ asset('frontend/img/icons/mail.svg')}}" alt="{{ $contact->alt  }}">
                    </div>
                    <div class="text">
                        <a href="mailto:{{ $contact->email  }}" class="mail">{{ $contact->email  }}</a>
                        <span>Напишите о сотрудничестве</span>
                    </div>
                </div>
                <div class="item">
                    <div class="icon">
                        <img src="{{ asset('frontend/img/icons/pin.svg')}}" alt="{{ $contact->alt  }}">
                    </div>
                    <div class="text">
                        <a href="{{ $contact->google  }}" class="address">
                            {!! $contact->address  !!}
                            <img src="{{ asset('frontend/img/icons/gps.svg')}}" alt="{{ $contact->alt  }}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="image">
                <img src="{{ asset('uploads')}}/{{ $contact->image_right }}" alt="{{ $contact->alt  }}">
            </div>
        </div>
    </div>
    @endif
@endsection
