<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
        return [
            //
            'nome' =>'required|string|max:255',
            'descricao' =>'required|red|string',
            'preco' => 'required|numeric|min:0',
            'slug' => 'required|string|mas:255',
            'image' => 'nullable|string|maz:255',
            'id_category' => 'required|exists:categories,id',
            'id_user' => 'required|exists:users,id'
        ];
    }
}
