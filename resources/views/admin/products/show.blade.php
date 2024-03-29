@extends('admin.layouts.admin')

@section('title', __('views.admin.products.show.title'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>{{ __('Product Name') }}</th>
                                <td>{{ $product->product_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Product Code') }}</th>
                                <td>{{ $product->product_code }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Price') }}</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Created At') }}</th>
                                <td>{{ $product->created_at }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Updated At') }}</th>
                                <td>{{ $product->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
