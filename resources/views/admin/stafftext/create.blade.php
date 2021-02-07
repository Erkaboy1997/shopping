@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.stafftext.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset class="form-group">
                <label for="basicInput">Заглавие</label>
                <input type="text" name="title" class="form-control" id="basicInput" placeholder="">
            </fieldset>

            <fieldset class="form-group">
                <label for="basicInput">описание</label>
                <textarea class="ckeditor form-control" name="description"></textarea>
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
