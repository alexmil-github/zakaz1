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
                                                <td>{{ \App\Models\Category::find($order->category_id)->name }}</td>
                                                <td><img src="public/storage/{{ $order->photo_before }}" width="100px">
                                                </td>
                                                <td>{{ $order->photo_after }}</td>
                                                <td>
{{--                                                    <form action="/order/{{$order->id}}" method="POST">--}}
                                                    <form action="{{ route('order.destroy', ['order' => $order->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-outline-danger" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                                                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"></path>
                                                            </svg>
                                                        </button>
                                                    </form>




                                                </td>
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
