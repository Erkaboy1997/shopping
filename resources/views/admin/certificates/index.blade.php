@extends('admin.layouts.main')
@section('content')
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.certificates.create')  }}">Создать</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>образ</th>
                                <th>alt</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($certificates as $value)
                                <tr>
                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $value->image  }}" width="100px">
                                    </td>
                                    <td>{{ $value->alt  }}</td>
                                    <td>
                                        <a style="margin-left: 10px" href="{{route('admin.certificates.edit',$value->id)}}" class="float-left fa fa-edit btn btn-info btn-sm" ></a>
                                        <form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('admin.certificates.destroy',$value->id)}}" method="post">
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
