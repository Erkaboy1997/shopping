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
                                <td>Code</td>
                                <td>{{ $product['code']  }}</td>
                            </tr>
                            <tr>
                                <td>Заглавие</td>
                                <td>{{ $product['name']  }}</td>
                            </tr>
                            <tr>
                                <td>Цена</td>
                                <td>{{ $product['price']  }}</td>
                            </tr>

                            <tr>
                                <td>Ценовая скидка</td>
                                <td>{{ $product['price_discount']  }}</td>
                            </tr>

                            <tr>
                                <td>Описание</td>
                                <td>{!! $product['description']  !!}</td>
                            </tr>

                            <tr>
                                <td>Детали доставки</td>
                                <td>{!! $product['delivery']  !!}</td>
                            </tr>

                            <tr>
                                <td>Характеристика</td>
                                <td>{!! $product['character']  !!}</td>
                            </tr>

                            <tr>
                                <td>образ</td>
                                <td>
                                    <img src="{{ asset('uploads')}}/{{ $product['image']  }}" width="200px">
                                </td>
                            </tr>
                            <tr>
                                <td>образ 2</td>
                                <td>
                                    <img src="{{ asset('uploads')}}/{{ $product['image1']  }}" width="200px">
                                </td>
                            </tr>

                            <tr>
                                <td>образ 3</td>
                                <td>
                                    <img src="{{ asset('uploads')}}/{{ $product['image2']  }}" width="200px">
                                </td>
                            </tr>

                            <tr>
                                <td>образ 4</td>
                                <td>
                                    <img src="{{ asset('uploads')}}/{{ $product['image3']  }}" width="200px">
                                </td>
                            </tr>

                            <tr>
                                <td>образ 5</td>
                                <td>
                                    <img src="{{ asset('uploads')}}/{{ $product['image4']  }}" width="200px">
                                </td>
                            </tr>

                            <tr>
                                <td>Alt</td>
                                <td>{{ $product['alt']  }}</td>
                            </tr>
                            <tr>
                                <td>Статус</td>
                                <td>
                                    @if($product['status'])
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
