@extends('admin.layouts.main')
@section('content')
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.discount.create')  }}">Создать</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>заглавие</th>
                                <th>описание</th>
                                <th>название</th>
                                <th>информация</th>
                                <th>образ</th>
                                <th>alt</th>
                                <th>дата</th>
                                <th>кнопка</th>
                                <th>тип</th>
                                <th>статус</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($discount as $value)
                                <tr>
                                    <td>{{ $value -> title  }}</td>
                                    <td>{{ $value -> description  }}</td>
                                    <td>{{ $value -> name  }}</td>
                                    <td>{{ $value -> info  }}</td>
                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $value->image  }}" width="100px">
                                    </td>
                                    <td>{{ $value->alt  }}</td>
                                    <td>{{ $value->lifetime  }}</td>
                                    <td>{{ $value->button }}</td>
                                    <td>
                                        @if($value->type)
                                            осталось
                                        @else
                                            верно
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
                                        <form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('admin.discount.destroy',$value->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {!! method_field('delete') !!}
                                            <button style="margin-left: 10px" type="submit"  class="fa fa-trash-o btn btn-danger btn-sm"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
