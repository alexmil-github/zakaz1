<div class="modal fade" id="modal_{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование заявки</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
{{--                        <form method="POST" action="{{ route('order.update') }}" enctype="multipart/form-data" id="addOrder">--}}
                        <form method="POST" action="/order/{{$order->id}}" enctype="multipart/form-data" id="addOrder">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-3">
                                <label for="adress" class="col-md-4 col-form-label text-md-end">{{ __('Адрес') }}</label>

                                <div class="col-md-6">
                                    <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ $order->adress }}" required autocomplete="adress" autofocus disabled>

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
                                    <input disabled id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $order->description }}" required autocomplete="description">

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

                                    <select class="form-control" name="category_id" id="select_category">
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}" {{ ($order->category_id === $category->id) ? "selected" : ""}}>{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" >
                                <label for="status" class="col-md-4 col-form-label text-md-end">Статус</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="status" id="status">
                                            <option {{ old('status',$order->status) == 'Новая' ? 'selected' : '' }}>Новая</option>
                                            <option {{ old('status',$order->status) == 'Ремонтируется' ? 'selected' : '' }}>Ремонтируется</option>
                                            <option {{ old('status',$order->status) =='Отремонтировано' ? 'selected' : '' }}>Отремонтировано</option>
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
                                    <input disabled id="max_price" type="number" class="form-control @error('max_price') is-invalid @enderror" name="max_price" value="{{ $order->max_price }}">

                                    @error('max_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" >
                                <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Согласованная цена') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $order->price }}" disabled>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="photo_after" class="col-md-4 col-form-label text-md-end">{{ __('Фото после...') }}</label>

                                <div class="col-md-6">
                                    <input id="photo_after" type="file" class="form-control" name="photo_after" disabled>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" form="addOrder" type="button" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

