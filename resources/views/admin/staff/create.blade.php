@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.staff.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Имя</label>
                        <input type="text" name="name" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Образ</label>
                        <input type="file" name="image" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">alt</label>
                        <input type="text" name="alt" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-3 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Позиция</label>
                        <input type="text" name="position" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
