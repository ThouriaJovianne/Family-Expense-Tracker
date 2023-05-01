<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRevenueRequest;
use App\Http\Requests\StoreRevenueRequest;
use App\Http\Requests\UpdateRevenueRequest;
use App\Models\Revenue;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RevenueController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('revenue_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $revenues = Revenue::with(['user'])->get();

        return view('admin.revenues.index', compact('revenues'));
    }

    public function create()
    {
        abort_if(Gate::denies('revenue_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.revenues.create', compact('users'));
    }

    public function store(StoreRevenueRequest $request)
    {
        $revenue = Revenue::create($request->all());

        return redirect()->route('admin.revenues.index');
    }

    public function edit(Revenue $revenue)
    {
        abort_if(Gate::denies('revenue_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $revenue->load('user');

        return view('admin.revenues.edit', compact('revenue', 'users'));
    }

    public function update(UpdateRevenueRequest $request, Revenue $revenue)
    {
        $revenue->update($request->all());

        return redirect()->route('admin.revenues.index');
    }

    public function show(Revenue $revenue)
    {
        abort_if(Gate::denies('revenue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $revenue->load('user');

        return view('admin.revenues.show', compact('revenue'));
    }

    public function destroy(Revenue $revenue)
    {
        abort_if(Gate::denies('revenue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $revenue->delete();

        return back();
    }

    public function massDestroy(MassDestroyRevenueRequest $request)
    {
        $revenues = Revenue::find(request('ids'));

        foreach ($revenues as $revenue) {
            $revenue->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}