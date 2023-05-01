@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.expence.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.expence.fields.id') }}
                        </th>
                        <td>
                            {{ $expence->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expence.fields.category') }}
                        </th>
                        <td>
                            {{ $expence->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expence.fields.amount') }}
                        </th>
                        <td>
                            {{ $expence->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expence.fields.name') }}
                        </th>
                        <td>
                            {{ $expence->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expence.fields.description') }}
                        </th>
                        <td>
                            {{ $expence->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expence.fields.expense_date') }}
                        </th>
                        <td>
                            {{ $expence->expense_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expence.fields.user') }}
                        </th>
                        <td>
                            {{ $expence->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection