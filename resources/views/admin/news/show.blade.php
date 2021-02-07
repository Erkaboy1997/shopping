@extends('admin.layouts.main')
@section('content')
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <td>Заглавие</td>
                                    <td>{{ $news['name']  }}</td>
                                </tr>

                                <tr>
                                    <td>Источник</td>
                                    <td>{{ $news['source']  }}</td>
                                </tr>
                                <tr>
                                    <td>образ</td>
                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $news['image']  }}" width="200px">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alt</td>
                                    <td>{{ $news['alt']  }}</td>
                                </tr>
                                <tr>
                                    <td>описание</td>
                                    <td>{!! $news['description']  !!}</td>
                                </tr>
                                <tr>
                                    <td>описание длинное</td>
                                    <td>{!! $news['description_long']  !!}</td>
                                </tr>
                                <tr>
                                    <td>ТАКЖЕ</td>
                                    <td>
                                        @if($news['also'])
                                            <p style="color: blue">Да</p>
                                        @else
                                            <p style="color: red">Да</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Статус</td>
                                    <td>
                                        @if($news['status'])
                                            <p style="color: blue">Да</p>
                                        @else
                                            <p style="color: red">Да</p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
