@extends('admin.layouts.main')
@section('content')
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.quote.create')  }}">Создать</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>Заглавие 1</th>
                                <th>Заглавие 2</th>
                                <th>Заглавие 3</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quote as $value)
                                <tr>
                                    <td>{{ $value -> title_one  }}</td>
                                    <td>{{ $value -> title_two  }}</td>
                                    <td>{{ $value -> title_three  }}</td>
                                    <td>
                                        <form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('admin.quote.destroy',$value->id)}}" method="post">
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
