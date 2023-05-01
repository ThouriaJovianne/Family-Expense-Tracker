<?php

namespace App\Http\Requests;

use App\Models\Balance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBalanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('balance_create');
    }

    public function rules()
    {
        return [
            'balance_amount' => [
                'required',
            ],
            'update_date' => [
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