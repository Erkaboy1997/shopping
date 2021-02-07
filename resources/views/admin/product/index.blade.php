@extends('admin.layouts.main')
@section('content')
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.product.create')  }}">Создать продукты</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Заглавие</th>
                                <th>Цена</th>
                                <th>Образ</th>
                                <th>Категория</th>
                                <th>Статус</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($product as $value)
                                <tr>
                                    <td>{{ $value -> code  }}</td>
                                    <td>{{ $value -> name  }}</td>
                                    <td>{{ $value -> price }}</td>
                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $value->image  }}" width="100px">
                                    </td>
                                    <td>
                                        @if(!empty($value->category_id))
                                            @php
                                                $cat = \Illuminate\Support\Facades\DB::table('category')->where('id',$value->category_id)->first();
                                            @endphp
                                            <?php if(isset($cat)) ?>
                                                {{ $cat->name  }}

                                        @else
                                            -------
                                        @endif
                                    </td>
                                    <td>
                                        @if($value->status)
                                            <p style="color: blue">Да</p>
                                        @else
                                            <p style="color: red">Нет</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a style="margin-left: 10px" href="{{route('admin.product.show',$value->id)}}" class="float-left fa fa-eye btn btn-success btn-sm" ></a>
                                        <a style="margin-left: 10px" href="{{route('admin.product.edit',$value->id)}}" class="float-left fa fa-edit btn btn-info btn-sm" ></a>
                                        <form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('admin.product.destroy',$value->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {!! method_field('delete') !!}
                                            <button style="margin-left: 10px" type="submit"  class="fa fa-trash-o btn btn-danger btn-sm"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $product->links()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
