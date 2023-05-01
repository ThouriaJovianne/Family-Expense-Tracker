@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.revenue.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.revenues.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.revenue.fields.id') }}
                        </th>
                        <td>
                            {{ $revenue->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.revenue.fields.name_of_source') }}
                        </th>
                        <td>
                            {{ $revenue->name_of_source }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.revenue.fields.amount') }}
                        </th>
                        <td>
                            {{ $revenue->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.revenue.fields.date_of_receipt') }}
                        </th>
                        <td>
                            {{ $revenue->date_of_receipt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.revenue.fields.user') }}
                        </th>
                        <td>
                            {{ $revenue->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.revenues.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection