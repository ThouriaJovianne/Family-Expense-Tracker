<?php

namespace App\Http\Requests;

use App\Models\Revenue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRevenueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('revenue_edit');
    }

    public function rules()
    {
        return [
            'name_of_source' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'required',
            ],
            'date_of_receipt' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}