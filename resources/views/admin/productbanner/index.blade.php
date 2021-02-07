@extends('admin.layouts.main')
@section('content')
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.productbanner.create')  }}">Создать</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>Образ осталось</th>
                                <th>Продукт оставлен</th>
                                <th>Заглавие</th>
                                <th>Образ правильно</th>
                                <th>Продукт правильно</th>
                                <th>alt</th>
                                <th>Статус</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($productbanner as $value)
                                <tr>
                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $value->image_left  }}" width="100px">
                                    </td>
                                    <td>
                                        @if(!empty($value->product_id))
                                            @php
                                                $product = \Illuminate\Support\Facades\DB::table('product')->where('id',$value->product_id)->first();
                                            @endphp
                                            <?php if(count($product) > 0){ ?>
                                                {{ $product->name  }}
                                            <?php } ?>
                                        @endif
                                    </td>
                                    <td>{{ $value -> title  }}</td>
                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $value->image_right  }}" width="100px">
                                    </td>
                                    <td>
                                        @if(!empty($value->product2_id))
                                            @php
                                                $product2 = \Illuminate\Support\Facades\DB::table('product')->where('id',$value->product2_id)->first();
                                            @endphp
                                            <?php if(count($product2)>0){ ?>
                                                {{ $product2->name  }}
                                            <?php } ?>
                                        @endif
                                    </td>
                                    <td>{{ $value->alt  }}</td>
                                    <td>
                                        @if($value->status)
                                            <p style="color: blue">Да</p>
                                        @else
                                            <p style="color: red">Нет</p>
                                        @endif
                                    </td>
                                    <td>
<!--                                        <a style="margin-left: 10px" href="{{route('admin.productbanner.show',$value->id)}}" class="float-left fa fa-eye btn btn-success btn-sm" ></a>
                                        <a style="margin-left: 10px" href="{{route('admin.productbanner.edit',$value->id)}}" class="float-left fa fa-edit btn btn-info btn-sm" ></a>-->
                                        <form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('admin.productbanner.destroy',$value->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {!! method_field('delete') !!}
                                            <button style="margin-left: 10px" type="submit"  class="fa fa-trash-o btn btn-danger btn-sm"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $productbanner->links()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
