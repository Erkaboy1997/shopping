@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.productbanner.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xl-6 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Образ осталось	</label>
                        <input type="file" name="image_left" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-6 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Продукт оставлен</label>
                        <select name="product_id" class="form-control">
                            @if(!empty($product))
                                @foreach($product as $value)
                                    <option value="{{ $value->id  }}">{{ $value->name  }}</option>
                                @endforeach
                            @endif
                        </select>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">заглавие</label>
                        <input type="text" name="title" class="form-control" id="basicInput" placeholder="">
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

            <div class="row">
                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Образ правильно</label>
                        <input type="file" name="image_right" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Alt</label>
                        <input type="text" name="alt" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Продукт правильно</label>
                        <select name="product2_id" class="form-control">
                            @if(!empty($product))
                                @foreach($product as $value)
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
