@extends('admin.layouts.admin')

@section('title', __('views.admin.salesmans.show.title', ['name' => $salesman->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

            <tr>
                <th>{{ __('views.admin.salesmans.show.table_header_0') }}</th>
                <td>{{ $salesman->name }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.salesmans.show.table_header_1') }}</th>
                <td>
                    <a href="mailto:{{ $salesman->email }}">
                        {{ $salesman->email }}
                    </a>
                </td>
            </tr>

            <tr>
                <th>{{ __('views.admin.salesmans.show.table_header_2') }}</th>
                <td>{{ $salesman->created_at }} ({{ $salesman->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.salesmans.show.table_header_3') }}</th>
                <td>{{ $salesman->updated_at }} ({{ $salesman->updated_at->diffForHumans() }})</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
