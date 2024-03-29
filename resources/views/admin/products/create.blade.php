@extends('admin.layouts.admin')

@section('title', __('views.admin.products.create.title'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.products.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="product_name">{{ __('views.admin.products.create.product_name') }}</label>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="product_code">{{ __('views.admin.products.create.product_code') }}</label>
                <input type="text" name="product_code" id="product_code" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">{{ __('views.admin.products.create.price') }}</label>
                <input type="text" name="price" id="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('views.admin.products.create.submit') }}</button>
            <a href="{{ route('admin.products') }}" class="btn btn-secondary">{{ __('views.admin.products.create.cancel') }}</a>
        </form>
    </div>
</div>
@endsection
