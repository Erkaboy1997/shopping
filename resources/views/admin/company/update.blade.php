@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.company.update',$company->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Заглавие</label>
                        <input type="text" value="{{ $company->title  }}" name="title" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">образ</label>
                        <input type="file" name="image" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Alt</label>
                        <input type="text" name="alt" class="form-control" value="{{ $company->alt  }}" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">название изображения</label>
                        <input type="text" name="image_title" value="{{ $company->image_title  }}" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>
            </div>

            <fieldset class="form-group">
                <label for="basicInput">описание</label>
                <textarea class="ckeditor form-control" name="description">{{ $company->description  }}</textarea>
            </fieldset>

            <fieldset class="form-group">
                <label for="basicInput">Описание изображения</label>
                <textarea class="ckeditor form-control" name="image_description">{{ $company->image_description }}</textarea>
            </fieldset>



            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'image_description' );
    </script>
@endsection
