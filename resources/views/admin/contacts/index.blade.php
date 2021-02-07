@extends('admin.layouts.main')
@section('content')
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.contacts.create')  }}">Создать контакты</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>образ 1</th>
                                <th>образ 2</th>
                                <th>Заглавие</th>
                                <th>Телефон 1</th>
                                <th>Телефон 2</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($contacts))
                                @foreach($contacts as $value)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('uploads')}}/{{ $value->image_left  }}" width="100px">
                                        </td>
                                        <td>
                                            <img src="{{ asset('uploads')}}/{{ $value->image_right  }}" width="100px">
                                        </td>
                                        <td>
                                            {{ $value->title  }}
                                        </td>
                                        <td>{{ $value->phone_first  }}</td>
                                        <td>{{ $value->phone_second  }}</td>
                                        <td>
                                            <a style="margin-left: 10px" href="{{route('admin.contacts.show',$value->id)}}" class="float-left fa fa-eye btn btn-success btn-sm" ></a>
                                            <form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('admin.contacts.destroy',$value->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {!! method_field('delete') !!}
                                                <button style="margin-left: 10px" type="submit"  class="fa fa-trash-o btn btn-danger btn-sm"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
