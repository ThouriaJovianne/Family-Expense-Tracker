@extends('layouts.admin')
@section('content')
@can('revenue_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.revenues.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.revenue.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.revenue.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Revenue">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.revenue.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.revenue.fields.name_of_source') }}
                        </th>
                        <th>
                            {{ trans('cruds.revenue.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.revenue.fields.date_of_receipt') }}
                        </th>
                        <th>
                            {{ trans('cruds.revenue.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($revenues as $key => $revenue)
                        <tr data-entry-id="{{ $revenue->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $revenue->id ?? '' }}
                            </td>
                            <td>
                                {{ $revenue->name_of_source ?? '' }}
                            </td>
                            <td>
                                {{ $revenue->amount ?? '' }}
                            </td>
                            <td>
                                {{ $revenue->date_of_receipt ?? '' }}
                            </td>
                            <td>
                                {{ $revenue->user->name ?? '' }}
                            </td>
                            <td>
                                @can('revenue_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.revenues.show', $revenue->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('revenue_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.revenues.edit', $revenue->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('revenue_delete')
                                    <form action="{{ route('admin.revenues.destroy', $revenue->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('revenue_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.revenues.massDestroy') }}",
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
  let table = $('.datatable-Revenue:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection