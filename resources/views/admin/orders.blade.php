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
            <th scope="col">Статус</th>
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
                    <td>{{ $order->status }}</td>
                    <td><img src="public/storage/{{ $order->photo_before }}" width="100px">
                    </td>
                    <td>{{ $order->photo_after }}</td>
                    <td>


                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>

                        @include('modal.editOrder', ['order'=>$order])


                    </td>
                </tr>



            @endforeach

        @endif


        </tbody>
    </table>
</div>

