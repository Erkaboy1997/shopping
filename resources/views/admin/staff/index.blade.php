@extends('admin.layouts.main')
@section('content')
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.staff.create')  }}">Создать</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Образ</th>
                                <th>Alt</th>
                                <th>Позиция</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($staff as $value)
                                <tr>
                                    <td>{{ $value -> name  }}</td>
                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $value->image  }}" width="100px">
                                    </td>
                                    <td>{{ $value->alt  }}</td>
                                    <td>{{ $value -> position  }}</td>
                                    <td>
                                        <form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('admin.staff.destroy',$value->id)}}" method="post">
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
