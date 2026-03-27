<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'whatsapp' => ['string', 'max:255', 'nullable'],        
            // NOVAS REGRAS DE VALIDAÇÃO
            'cpf' => ['nullable', 'string', 'max:14'],
            'birthdate' => ['nullable', 'string', 'max:8'],
            'endereco' => ['nullable', 'string', 'max:255'],
            'bairro' => ['nullable', 'string', 'max:100'],
            'cep' => ['nullable', 'string', 'max:9'],
            'municipio' => ['nullable', 'string', 'max:100'],
            'num_caf' => ['nullable', 'string', 'max:255'],
            'num_car' => ['nullable', 'string', 'max:255'],
            'caf_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'], // Exemplo: até 5MB
            'car_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120']
        ];
    }
}
