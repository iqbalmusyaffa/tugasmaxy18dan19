@extends('admin.layouts.admin')

@section('title', __('views.admin.purchase.order.lines.show.title'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>{{ __('Product ID') }}</th>
                                <td>{{ $purchaseOrderLine->product_id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Quantity') }}</th>
                                <td>{{ $purchaseOrderLine->qty }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Price') }}</th>
                                <td>{{ $purchaseOrderLine->price }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Discount') }}</th>
                                <td>{{ $purchaseOrderLine->discount }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Total') }}</th>
                                <td>{{ $purchaseOrderLine->total }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Created At') }}</th>
                                <td>{{ $purchaseOrderLine->created_at }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Updated At') }}</th>
                                <td>{{ $purchaseOrderLine->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
