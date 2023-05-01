<?php

namespace App\Http\Requests;

use App\Models\Expence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExpenceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expence_create');
    }

    public function rules()
    {
        return [
            'amount' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'expense_date' => [
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