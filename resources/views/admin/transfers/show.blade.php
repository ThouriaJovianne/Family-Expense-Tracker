@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transfer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transfers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.id') }}
                        </th>
                        <td>
                            {{ $transfer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.amount') }}
                        </th>
                        <td>
                            {{ $transfer->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.transfer_date') }}
                        </th>
                        <td>
                            {{ $transfer->transfer_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.users') }}
                        </th>
                        <td>
                            @foreach($transfer->users as $key => $users)
                                <span class="label label-info">{{ $users->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transfers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection