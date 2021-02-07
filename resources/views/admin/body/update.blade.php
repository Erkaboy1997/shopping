@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.body.update',$body->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="col-xl-12 col-md-12 col-12 mb-1">
                <fieldset class="form-group">
                    <label for="basicInput">Заглавие</label>
                    <input type="text" name="name" value="{{ $body->name  }}" class="form-control" id="basicInput" placeholder="">
                </fieldset>
            </div>

            <div class="col-xl-12 col-md-12 col-12 mb-1">
                <fieldset class="form-group">
                    <label for="basicInput">Статус</label>
                    <select name="status" class="form-control">
                        <option value="1">Актив</option>
                        <option value="0">Но актив</option>
                    </select>
                </fieldset>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
