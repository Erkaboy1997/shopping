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
                                <td>{{ $contacts['title']  }}</td>
                            </tr>
                            <tr>
                                <td>образ 1</td>
                                <td>
                                    <img src="{{ asset('uploads')}}/{{ $contacts['image_left']  }}" width="200px">
                                </td>
                            </tr>
                            <tr>
                                <td>образ 2</td>
                                <td>
                                    <img src="{{ asset('uploads')}}/{{ $contacts['image_right']  }}" width="200px">
                                </td>
                            </tr>
                            <tr>
                                <td>alt</td>
                                <td>{{ $contacts['alt']  }}</td>
                            </tr>
                            <tr>
                                <td>Телефон 1</td>
                                <td>{{ $contacts['phone_first']  }}</td>
                            </tr>

                            <tr>
                                <td>Телефон 2</td>
                                <td>{{ $contacts['phone_second']  }}</td>
                            </tr>

                            <tr>
                                <td>Рабочие часы</td>
                                <td>{{ $contacts['work_hours']  }}</td>
                            </tr>

                            <tr>
                                <td>электронное письмо</td>
                                <td>{{ $contacts['email']  }}</td>
                            </tr>

                            <tr>
                                <td>адрес</td>
                                <td>{{ $contacts['address']  }}</td>
                            </tr>

                            <tr>
                                <td>google map</td>
                                <td>{{ $contacts['google']  }}</td>
                            </tr>

                            <tr>
                                <td>Telegram</td>
                                <td>{{ $contacts['telegram']  }}</td>
                            </tr>

                            <tr>
                                <td>Facebook</td>
                                <td>{{ $contacts['facebook']  }}</td>
                            </tr>

                            <tr>
                                <td>Instagram</td>
                                <td>{{ $contacts['instagram']  }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
