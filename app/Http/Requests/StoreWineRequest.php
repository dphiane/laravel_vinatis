<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreWineRequest extends FormRequest
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
        $wineId = $this->route('vin');
        return [
            'name' => [
                'required',
                Rule::unique('wines', 'name')->ignore($wineId),
                'max:255',
                'min:2',
            ],
            'region_id' => 'required|exists:regions,id',
            'year' => 'required|numeric|digits:4',
            'domain' => [
                'required',
                Rule::unique('wines', 'domain')->ignore($wineId),
                'min:2',
                'max:255'
            ]
        ];
    }
    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du vin est obligatoire.',
            'name.unique' => 'Ce vin existe déjà dans la base de données.',
            'name.max' => 'Le nom du vin ne doit pas dépasser 255 caractères.',
            'name.min' => 'Le nom du vin doit contenir au moins 2 caractères.',
            'region_id.required' => 'La région est obligatoire.',
            'region_id.exists' => 'La région sélectionnée est invalide.',
            'year.numeric' => 'L\'année doit être numérique',
            'year.digits' => 'L\'année doit faire 4 chiffres',
            'domain.required' => 'Le nom du domaine est obligatoire.',
            'domain.unique' => 'Ce domaine existe déjà dans la base de données.',
            'domain.max' => 'Le nom du domaine ne doit pas dépasser 255 caractères.',
            'domain.min' => 'Le nom du domaine doit contenir au moins 2 caractères.',
        ];
    }
}
