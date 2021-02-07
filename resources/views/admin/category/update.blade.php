@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.category.update',$cat->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Заглавие</label>
                        <input type="text" value="{{ $cat->name  }}" name="name" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>
                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">образ</label>
                        <input type="file" name="image" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>
                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">alt</label>
                        <input type="text" value="{{ $cat->alt  }}" name="alt" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Категория главная</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Главная</option>
                            @if(!empty($category))
                                @foreach($category as $value)
                                    <option value="{{ $value->id  }}">{{ $value->name  }}</option>
                                @endforeach
                            @endif
                        </select>
                    </fieldset>
                </div>
                <div class="col-xl-6 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Статус</label>
                        <select name="status" class="form-control">
                            <option value="1">Активе</option>
                            <option value="0">Но активе</option>
                        </select>
                    </fieldset>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
