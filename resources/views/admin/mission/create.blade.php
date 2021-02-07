@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.mission.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Заглавие</label>
                        <input type="text" name="title" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Заглавие 2</label>
                        <input type="text" name="title_left" class="form-control" id="basicInput" placeholder="">
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
                        <label for="basicInput">alt</label>
                        <input type="text" name="alt" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>
            </div>

            <fieldset class="form-group">
                <label for="basicInput">описание</label>
                <textarea class="ckeditor form-control" name="description_left"></textarea>
            </fieldset>

            <fieldset class="form-group">
                <label for="basicInput">Описание 2</label>
                <textarea class="ckeditor form-control" name="description_right"></textarea>
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
