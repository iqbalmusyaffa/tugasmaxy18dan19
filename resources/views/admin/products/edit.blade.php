@extends('admin.layouts.admin')

@section('title', __('views.admin.products.edit.title'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_content">
                <form method="post" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="product_name">{{ __('Product Name') }}</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" >
                    </div>
                    <div class="form-group">
                        <label for="product_code">{{ __('Product Code') }}</label>
                        <input type="text" class="form-control" id="product_code" name="product_code" value="{{ $product->product_code }}" >
                    </div>
                    <div class="form-group">
                        <label for="price">{{ __('Price') }}</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
