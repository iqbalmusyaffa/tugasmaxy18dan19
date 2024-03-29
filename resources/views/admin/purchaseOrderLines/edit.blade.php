@extends('admin.layouts.admin')

@section('title', __('views.admin.purchase.order.lines.edit.title'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_content">
                <form method="post" action="{{ route('admin.purchase.order.lines.update', $purchaseOrderLine->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="product_id">{{ __('Product') }}</label>
                        <select class="form-control" id="product_id" name="product_id">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $purchaseOrderLine->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->product_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">{{ __('Quantity') }}</label>
                        <input type="text" class="form-control" id="qty" name="qty" value="{{ $purchaseOrderLine->qty }}">
                    </div>
                    <div class="form-group">
                        <label for="price">{{ __('Price') }}</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $purchaseOrderLine->price }}">
                    </div>
                    <div class="form-group">
                        <label for="discount">{{ __('Discount') }}</label>
                        <input type="text" class="form-control" id="discount" name="discount" value="{{ $purchaseOrderLine->discount }}">
                    </div>
                    <div class="form-group">
                        <label for="total">{{ __('Total') }}</label>
                        <input type="text" class="form-control" id="total" name="total" value="{{ $purchaseOrderLine->total }}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
