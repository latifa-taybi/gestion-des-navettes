<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOffreRequest extends FormRequest
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
            'titre' => 'required',
                'description' => 'required',
                'ville_depart' => 'required',
                'ville_arrivee' => 'required',
                'date_depart' => 'required|date',
                'date_arrivee' => 'required|date',
                'place_dispo' => 'required|integer',
                'prix' => 'required|numeric'
        ];
    }
}
