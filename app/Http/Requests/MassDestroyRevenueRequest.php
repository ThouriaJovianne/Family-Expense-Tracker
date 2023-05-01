<?php

namespace App\Http\Requests;

use App\Models\Revenue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRevenueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('revenue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:revenues,id',
        ];
    }
}