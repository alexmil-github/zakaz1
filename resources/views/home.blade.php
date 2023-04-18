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
                                            <td><img src="{{ $order->photo_before }}" width="100px"></td>
                                            <td>{{ $order->photo_after }}</td>
                                            <td></td>
                                        </tr>

                                    @endforeach

                                @endif


                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="adress" class="col-md-4 col-form-label text-md-end">{{ __('Адрес') }}</label>

                                        <div class="col-md-6">
                                            <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" autofocus>

                                            @error('adress')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Описание') }}</label>

                                        <div class="col-md-6">
                                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="category" class="col-md-4 col-form-label text-md-end">Категория</label>

                                        <div class="col-md-6">
                                            <select class="form-control" name="category_id">
                                                @foreach(\App\Models\Category::all() as $category)
                                                <option value="{{ $category->id }}">{{$category->name}}</option>
                                                @endforeach

                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="max_price" class="col-md-4 col-form-label text-md-end">{{ __('Максимальаня цена') }}</label>

                                        <div class="col-md-6">
                                            <input id="max_price" type="number" class="form-control @error('max_price') is-invalid @enderror" name="max_price" required>

                                            @error('max_price')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="photo_before" class="col-md-4 col-form-label text-md-end">{{ __('Фото до...') }}</label>

                                        <div class="col-md-6">
                                            <input id="photo_before" type="file" class="form-control" name="photo_before" required>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Добавить') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
