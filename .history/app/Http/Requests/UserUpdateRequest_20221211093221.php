<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */

    protected function prepareForValidation()
    {

        if ($this->request->get('password') == null) {
            $this->request->remove('password');
        }
    }
}
