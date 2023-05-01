<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransferRequest;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\UpdateTransferRequest;
use App\Models\Transfer;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransfersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transfer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfers = Transfer::with(['users'])->get();

        return view('admin.transfers.index', compact('transfers'));
    }

    public function create()
    {
        abort_if(Gate::denies('transfer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id');

        return view('admin.transfers.create', compact('users'));
    }

    public function store(StoreTransferRequest $request)
    {
        $transfer = Transfer::create($request->all());
        $transfer->users()->sync($request->input('users', []));

        return redirect()->route('admin.transfers.index');
    }

    public function edit(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id');

        $transfer->load('users');

        return view('admin.transfers.edit', compact('transfer', 'users'));
    }

    public function update(UpdateTransferRequest $request, Transfer $transfer)
    {
        $transfer->update($request->all());
        $transfer->users()->sync($request->input('users', []));

        return redirect()->route('admin.transfers.index');
    }

    public function show(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer->load('users');

        return view('admin.transfers.show', compact('transfer'));
    }

    public function destroy(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransferRequest $request)
    {
        $transfers = Transfer::find(request('ids'));

        foreach ($transfers as $transfer) {
            $transfer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}