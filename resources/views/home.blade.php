@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Добавление новой заявки') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <div class="row">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Адрес</th>
                                        <th scope="col">Описание</th>
                                        <th scope="col">Максимальная цена</th>
                                        <th scope="col">Цена</th>
                                        <th scope="col">Категория</th>
                                        <th scope="col">Фото до</th>
                                        <th scope="col">Фото после</th>
                                        <th scope="col"></th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    @if(count($orders))
                                        @foreach($orders as $key=>$order)
                                            <tr>
                                                <th scope="row">{{ $key+1 }}</th>
                                                <td>{{ $order->adress }}</td>
                                                <td>{{ $order->description }}</td>
                                                <td>{{ $order->max_price }}</td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->category_id }}</td>
                                                <td><img src="public/storage/{{ $order->photo_before }}" width="100px">
                                                </td>
                                                <td>{{ $order->photo_after }}</td>
                                                <td></td>
                                            </tr>

                                        @endforeach

                                    @endif


                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                    Добавить
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modal.addOrder')

@endsection
