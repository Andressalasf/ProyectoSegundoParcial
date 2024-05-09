<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('post')) {
            return [
                'first_name' => 'required|string',
                'identification_document' => 'nullable|string',
                'email' => 'required|email|unique:customers,email',
                'phone' => 'nullable|string|max:10', 
                'address' => 'nullable|string',
                'status' => 'nullable|string',
                'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
                'registered_by' => 'nullable|string',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'first_name' => 'required|string',
                'identification_document' => 'nullable|string',
                'email' => 'required|email',
                'phone' => 'nullable|string|max:10', 
                'address' => 'nullable|string',
                'status' => 'nullable|string',
                'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
                'registered_by' => 'nullable|string',
            ];
        }
    }
}
