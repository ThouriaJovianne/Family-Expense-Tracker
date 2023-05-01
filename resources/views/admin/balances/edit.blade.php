@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.balance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.balances.update", [$balance->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="balance_amount">{{ trans('cruds.balance.fields.balance_amount') }}</label>
                <input class="form-control {{ $errors->has('balance_amount') ? 'is-invalid' : '' }}" type="number" name="balance_amount" id="balance_amount" value="{{ old('balance_amount', $balance->balance_amount) }}" step="0.01" required>
                @if($errors->has('balance_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('balance_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.balance_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="update_date">{{ trans('cruds.balance.fields.update_date') }}</label>
                <input class="form-control date {{ $errors->has('update_date') ? 'is-invalid' : '' }}" type="text" name="update_date" id="update_date" value="{{ old('update_date', $balance->update_date) }}" required>
                @if($errors->has('update_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('update_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.update_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.balance.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $balance->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection