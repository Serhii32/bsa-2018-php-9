<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin');
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return Request
     */
    protected function failedAuthorization()
    {
        return redirect('/');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'short_name' => 'required|string|min:2|max:10',
            'logo_url' => 'required|url',
            'price' => 'required|numeric|min:0.00'
        ];
    }
}
