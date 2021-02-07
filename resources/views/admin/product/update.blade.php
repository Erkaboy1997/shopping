@extends('admin.layouts.main')
@section('content')
    <div class="card-body">
        <form action="{{route('admin.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Заглавие</label>
                        <input type="text" name="name" value="{{ $product->name  }}" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Цена</label>
                        <input type="text" name="price" value="{{ $product->price  }}" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-6 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Ценовая скидка</label>
                        <input type="text" name="price_discount" value="{{ $product->price_discount  }}" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Рекомендуется</label>
                        <select name="recomended" class="form-control">
                            @if($product->recomended == 1)
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            @else
                                <option value="0">Нет</option>
                                <option value="1">Да</option>
                            @endif
                        </select>
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Категория</label>
                        <select name="category_id" class="form-control">
                            @if(!empty($category))
                                @foreach($category as $value)
                                    @if($value->id == $product->category_id)
                                        <option value="{{ $value->id  }}">{{ $value->name  }}</option>
                                    @endif
                                @endforeach

                                @foreach($category as $value)
                                    @if($value->id != $product->category_id)
                                        <option value="{{ $value->id  }}">{{ $value->name  }}</option>
                                        @endif
                                @endforeach
                            @endif
                        </select>
                    </fieldset>
                </div>

                <div class="col-xl-4 col-md-4 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Статус</label>
                        <select name="status" class="form-control">
                            @if($product->status == 1)
                                <option value="1">Активе</option>
                                <option value="0">Но активе</option>
                            @else
                                <option value="0">Но активе</option>
                                <option value="1">Активе</option>
                            @endif
                        </select>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-2 col-md-2 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Образ 1</label>
                        <input type="file" name="image" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-2 col-md-2 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Образ 2</label>
                        <input type="file" name="image1" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-2 col-md-2 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Образ 3</label>
                        <input type="file" name="image2" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-2 col-md-2 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Образ 4</label>
                        <input type="file" name="image3" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-2 col-md-2 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">Образ 5</label>
                        <input type="file" name="image4" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>

                <div class="col-xl-2 col-md-2 col-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">alt</label>
                        <input type="text" value="{{ $product->alt  }}" name="alt" class="form-control" id="basicInput" placeholder="">
                    </fieldset>
                </div>
            </div>

            @if(!empty($colors))
                <div class="card">
                    <div class="card-header">
                        <p>Цвета продукта</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-xl-2 col-md-2 col-12 mb-1">
                                <ul class="list-unstyled mb-0">
                                    @if(!empty($colors))
                                        @foreach($colors as $value)
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" {{ $product->hasAnyColor($value->name)?'checked':''  }} name="colors[]" value="{{ $value->id  }}">
                                                        <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                        <span class="">{{ $value->name  }}</span>
                                                    </div>
                                                </fieldset>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(!empty($sizes))
                <div class="card">
                    <div class="card-header">
                        <p>Размер продукта</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-xl-2 col-md-2 col-12 mb-1">
                                <ul class="list-unstyled mb-0">
                                    @if(!empty($sizes))
                                        @foreach($sizes as $value)
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" {{ $product->hasAnySize($value->name)?'checked':''  }}  name="sizes[]" value="{{ $value->id  }}">
                                                        <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                        <span class="">{{ $value->name  }}</span>
                                                    </div>
                                                </fieldset>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(!empty($seasons))
                <div class="card">
                    <div class="card-header">
                        <p>Сезонный продукт</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-xl-2 col-md-2 col-12 mb-1">
                                <ul class="list-unstyled mb-0">
                                    @foreach($seasons as $value)
                                        <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" {{ $product->hasAnySeason($value->name)?'checked':''  }} name="seasons[]" value="{{ $value->id  }}">
                                                    <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                    <span class="">{{ $value->name  }}</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <fieldset class="form-group">
                <label for="basicInput">Описание</label>
                <textarea class="ckeditor form-control" name="description">{{ $product->description  }}</textarea>
            </fieldset>

            <fieldset class="form-group">
                <label for="basicInput">Детали доставки</label>
                <textarea class="ckeditor form-control" name="delivery">{{ $product->delivery  }}</textarea>
            </fieldset>

            <fieldset class="form-group">
                <label for="basicInput">Характеристика</label>
                <textarea class="ckeditor form-control" name="character">{{ $product->character }}</textarea>
            </fieldset>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'description_long' );
    </script>
@endsection
