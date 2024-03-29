@extends('admin.layouts.admin')

@section('title', __('views.admin.salesmen.index.title'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.salesmans.create') }}">
                <button>{{ __('views.admin.salesmen.index.create_button') }}</button>
            </a>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name', __('views.admin.salesmen.index.name_column'),['page' => $salesmen->currentPage()])</th>
                <th>@sortablelink('email', __('views.admin.salesmen.index.email_column'),['page' => $salesmen->currentPage()])</th>
                <th>@sortablelink('created_at', __('views.admin.salesmen.index.created_at_column'),['page' => $salesmen->currentPage()])</th>
                <th>@sortablelink('updated_at', __('views.admin.salesmen.index.updated_at_column'),['page' => $salesmen->currentPage()])</th>
                <th>{{ __('views.admin.salesmen.index.actions_column') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($salesmen as $salesman)
                <tr>
                    <td>{{ $salesman->name }}</td>
                    <td>{{ $salesman->email }}</td>
                    <td>{{ $salesman->created_at }}</td>
                    <td>{{ $salesman->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.salesmans.show', [$salesman->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.salesmen.index.show_button') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.salesmans.edit', [$salesman->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.salesmen.index.edit_button') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <form action="{{ route('admin.salesmans.destroy', [$salesman->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.salesmen.index.delete_button') }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $salesmen->links() }}
        </div>
    </div>
@endsection
