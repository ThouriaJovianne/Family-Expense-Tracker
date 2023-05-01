@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.balance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.balances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.balance.fields.id') }}
                        </th>
                        <td>
                            {{ $balance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.balance.fields.balance_amount') }}
                        </th>
                        <td>
                            {{ $balance->balance_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.balance.fields.update_date') }}
                        </th>
                        <td>
                            {{ $balance->update_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.balance.fields.user') }}
                        </th>
                        <td>
                            {{ $balance->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.balances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection