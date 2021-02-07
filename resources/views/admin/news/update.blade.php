@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.news.update',$new->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Заглавие</label>
                        <input type="text" name="name" value="{{ $new->name  }}" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Источник</label>
                        <input type="text" name="source" value="{{ $new->source  }}" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Образ</label>
                        <input type="file" class="btn btn-info"  value="{{ $new->image  }}"  name="image"
                               onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </fieldset>
                </div>
            </div>

            <fieldset class="form-group">
                <label for="basicInput">Описание</label>
                <textarea class="ckeditor form-control" name="description">
                    {{ $new->description  }}
                </textarea>
            </fieldset>

            <fieldset class="form-group">
                <label for="basicInput">Описание длинное</label>
                <textarea class="ckeditor form-control" name="description_long">
                    {{ $new->description_long  }}
                </textarea>
            </fieldset>

            <div class="row">
                <div class="col-xl-4 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Категория</label>
                        <input type="text" name="category" value="{{ $new->category  }}" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">ТАКЖЕ </label>
                        <select name="also" class="form-control">
                            <option value="1">Активе</option>
                            <option value="0">Но активе</option>
                        </select>
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
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'description_long' );
    </script>
@endsection
