@extends('layouts.admin')
@section('content')
@can('expence_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.expences.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.expence.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.expence.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Expence">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.expence.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.expence.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.expence.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.expence.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.expence.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.expence.fields.expense_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.expence.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expences as $key => $expence)
                        <tr data-entry-id="{{ $expence->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $expence->id ?? '' }}
                            </td>
                            <td>
                                {{ $expence->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $expence->amount ?? '' }}
                            </td>
                            <td>
                                {{ $expence->name ?? '' }}
                            </td>
                            <td>
                                {{ $expence->description ?? '' }}
                            </td>
                            <td>
                                {{ $expence->expense_date ?? '' }}
                            </td>
                            <td>
                                {{ $expence->user->name ?? '' }}
                            </td>
                            <td>
                                @can('expence_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.expences.show', $expence->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('expence_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.expences.edit', $expence->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('expence_delete')
                                    <form action="{{ route('admin.expences.destroy', $expence->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('expence_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.expences.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Expence:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection