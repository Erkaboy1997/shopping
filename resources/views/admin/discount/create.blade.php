@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.discount.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xl-4 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">заглавие</label>
                        <input type="text" name="title" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">описание</label>
                        <input type="text" name="description" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">название</label>
                        <input type="text" name="name" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">информация</label>
                        <input type="text" name="info" class="form-control" id="basicInput" placeholder="">
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
                        <input type="text" name="alt" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-3 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">тип</label>
                        <select name="type" class="form-control">
                            <option value="1">осталось</option>
                            <option value="0">верно</option>
                        </select>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">дата</label>
                        <input type="text" name="lifetime" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">кнопка</label>
                        <input type="text" name="button" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-4 col-12 mb-1">
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
