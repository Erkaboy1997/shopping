@extends('layouts.main')
@section('content')
    <div class="page">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <ul>
                    @foreach($errors->all as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('sendemail/send')  }}" style="margin-top: 50px">
            {{ csrf_field()  }}
            <div class="form-group">
                <label>Enter Your name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label>Enter Your Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label>Enter Your Message</label>
                <textarea name="message" class="form-control">

                </textarea>
            </div>
            <div class="form-control">
                <button type="submit" name="send" value="Send" class="btn btn-info">Send</button>
            </div>
        </form>
    </div>
@endsection
