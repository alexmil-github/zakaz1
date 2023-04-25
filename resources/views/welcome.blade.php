@extends('layouts.welcome')

@section('content')
    <div class="container">
        <div class="row justify-content-center gap-3">
            @if(count($orders))

                @foreach($orders as $key=>$order)
                    <div class="card" style="width: 18rem;">
                        <img src="public/storage/{{ $order->photo_before }}" class="card-img-top" alt="{{ $order->adress }}" onmouseover="after()" onmouseout="before()" >
                        <div class="card-body">
                            <h5 class="card-title">Адрес: {{ $order->adress }}</h5>
                            <p class="card-text">Категория: {{ \App\Models\Category::find($order->category_id) -> name  }}</p>
                            <p class="card-text">Описание: {{ $order->description }}</p>
                            <p class="card-text">Временная метка: {{ $order->created_at }}</p>
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
    </div>

    @include('modal.addOrder')

@endsection
