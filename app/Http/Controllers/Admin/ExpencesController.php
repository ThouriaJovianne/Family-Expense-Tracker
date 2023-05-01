<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpenceRequest;
use App\Http\Requests\StoreExpenceRequest;
use App\Http\Requests\UpdateExpenceRequest;
use App\Models\Category;
use App\Models\Expence;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpencesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expences = Expence::with(['category', 'user'])->get();

        return view('admin.expences.index', compact('expences'));
    }

    public function create()
    {
        abort_if(Gate::denies('expence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.expences.create', compact('categories', 'users'));
    }

    public function store(StoreExpenceRequest $request)
    {
        $expence = Expence::create($request->all());

        return redirect()->route('admin.expences.index');
    }

    public function edit(Expence $expence)
    {
        abort_if(Gate::denies('expence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expence->load('category', 'user');

        return view('admin.expences.edit', compact('categories', 'expence', 'users'));
    }

    public function update(UpdateExpenceRequest $request, Expence $expence)
    {
        $expence->update($request->all());

        return redirect()->route('admin.expences.index');
    }

    public function show(Expence $expence)
    {
        abort_if(Gate::denies('expence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expence->load('category', 'user');

        return view('admin.expences.show', compact('expence'));
    }

    public function destroy(Expence $expence)
    {
        abort_if(Gate::denies('expence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expence->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpenceRequest $request)
    {
        $expences = Expence::find(request('ids'));

        foreach ($expences as $expence) {
            $expence->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}