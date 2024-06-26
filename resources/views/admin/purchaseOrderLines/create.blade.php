@extends('admin.layouts.admin')

@section('title', __('views.admin.purchase.order.lines.create.title'))

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.purchase.order.lines.create'],'method' => 'post','class'=>'form-horizontal form-label-left']) }}


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_id">
                    {{ __('views.admin.purchase.order.lines.create.product_id') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="product_id" class="form-control col-md-7 col-xs-12 @if($errors->has('product_id')) parsley-error @endif"
                            name="product_id" required>
                        <option value="">Select Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('product_id'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('product_id') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qty">
                    {{ __('views.admin.purchase.order.lines.create.qty') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="qty" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('qty')) parsley-error @endif"
                           name="qty"  required>
                    @if($errors->has('qty'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('qty') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">
                    {{ __('views.admin.purchase.order.lines.create.price') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="price" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('price')) parsley-error @endif"
                           name="price"  required>
                    @if($errors->has('price'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('price') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount">
                    {{ __('views.admin.purchase.order.lines.create.discount') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="discount" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('discount')) parsley-error @endif"
                           name="discount"  required>
                    @if($errors->has('discount'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('discount') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total">
                    {{ __('views.admin.purchase.order.lines.create.total') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="total" type="text" class="form-control col-md-7 col-xs-12" name="total" required disabled>
                    @if($errors->has('total'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('total') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{ URL::previous() }}">{{ __('views.admin.purchase.order.lines.create.cancel') }}</a>
                    <button type="submit" class="btn btn-success">{{ __('views.admin.purchase.order.lines.create.save') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#qty, #price, #discount').keyup(function() {
            var qty = parseFloat($('#qty').val()) || 0;
            var price = parseFloat($('#price').val()) || 0;
            var discount = parseFloat($('#discount').val()) || 0;
            var total = (qty * price) - discount;
            $('#total').val(total.toFixed(2));
        });
    });
</script>

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection
