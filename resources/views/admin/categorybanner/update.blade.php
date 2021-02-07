@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.categorybanner.update',$banner->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
            <div class="row">
                <div class="col-xl-3 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Заглавие</label>
                        <input type="text" name="name" value="{{ $banner->name  }}" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>
                <div class="col-xl-3 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">образ</label>
                        <input type="file" name="image" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-3 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">alt</label>
                        <input type="text" name="alt" class="form-control" value="{{ $banner->alt  }}" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-3 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Категория</label>
                        <select name="category_id" class="form-control">
                            @if(!empty($category))
                                @foreach($category as $value)
                                    <option value="{{ $value->id  }}">{{ $value->name  }}</option>
                                @endforeach
                            @endif
                        </select>
                    </fieldset>
                </div>
            </div>


            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
