<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'sale_date' => 'required|date',
                'total_sale' => 'required|numeric|min:0',
                'customer_id' => 'required|exists:customers,id',
                'status' => 'nullable|string',
                'registered_by' => 'nullable|string',
                'route' => 'nullable|string',
                'sale_details' => 'required|array|min:1',
                'sale_details.*.quantity' => 'required|integer|min:1',
                'sale_details.*.subtotal' => 'required|numeric|min:0',
                'sale_details.*.product_id' => 'required|exists:products,id',
                'sale_details.*.registered_by' => 'nullable|string'
            ];
        } elseif ($this->isMethod('PUT')) {
            return [
                'sale_date' => 'required|date',
                'total_sale' => 'required|numeric|min:0',
                'customer_id' => 'required|exists:customers,id',
                'status' => 'nullable|string',
                'registered_by' => 'nullable|string',
                'route' => 'nullable|string',
                'sale_details' => 'required|array|min:1',
                'sale_details.*.quantity' => 'required|integer|min:1',
                'sale_details.*.subtotal' => 'required|numeric|min:0',
                'sale_details.*.product_id' => 'required|exists:products,id',
                'sale_details.*.registered_by' => 'nullable|string'
            ];
        }
    }
}
