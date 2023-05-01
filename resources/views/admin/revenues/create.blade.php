@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.revenue.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.revenues.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name_of_source">{{ trans('cruds.revenue.fields.name_of_source') }}</label>
                <input class="form-control {{ $errors->has('name_of_source') ? 'is-invalid' : '' }}" type="text" name="name_of_source" id="name_of_source" value="{{ old('name_of_source', '') }}">
                @if($errors->has('name_of_source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_of_source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.revenue.fields.name_of_source_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.revenue.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.revenue.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_of_receipt">{{ trans('cruds.revenue.fields.date_of_receipt') }}</label>
                <input class="form-control date {{ $errors->has('date_of_receipt') ? 'is-invalid' : '' }}" type="text" name="date_of_receipt" id="date_of_receipt" value="{{ old('date_of_receipt') }}" required>
                @if($errors->has('date_of_receipt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_receipt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.revenue.fields.date_of_receipt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.revenue.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.revenue.fields.user_helper') }}</span>
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