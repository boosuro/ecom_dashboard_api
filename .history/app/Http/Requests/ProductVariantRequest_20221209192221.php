<?php

namespace App\Http\Requests;

use Laracasts\Flash\Flash;
use App\Models\ProductVariant;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductVariantRequest extends FormRequest
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
        return ProductVariant::$rules;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        Flash::error('Fill the Input Fields ' . $errors);

        // $response = response()->json([
        //     'message' => 'Invalid data send',
        //     'details' => $errors->messages(),
        // ], 422);

        // throw new HttpResponseException($response);
    }
}
