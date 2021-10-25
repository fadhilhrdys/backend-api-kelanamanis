<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'phone_number' => 'required',
            'address' => 'required',
            'zip' => 'required|integer',
            'toping' => 'nullable|string',
            'quantity' => 'required|integer',
            'payment' => 'required|file',
            'transaction_total' => 'required|integer',
            'transaction_status' => 'nullable|string|in:PENDING,PROCESS,SUCCESS',
            'transaction' => 'required|array',
            'transaction.*' => 'integer|exists:menus,id',
        ];
    }
}
