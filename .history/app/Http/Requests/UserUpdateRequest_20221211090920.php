<?php

namespace App\Http\Requests;

use App\Models\User;
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
        return User::$rules;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */

    protected function prepareForValidation()
    {
        dd($this->request->password);
        if ($this->request->get('password') == null) {
            $this->request->remove('password');
        }
    }
}
