<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaterielInventaireRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'matriculeEmployee'=> 'required',
            'site' => 'required',
            'nomEmployee' => 'required',
            'serviceEmployee' => 'required',
            'fonctionEmployee' => 'required',
            'modelMateriel' => 'required',
            'nomMateriel' => 'required',
            'anneeAquisition',
        ];
    }
}
