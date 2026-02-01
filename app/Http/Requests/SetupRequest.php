<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetupRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Você pode deixar true aqui porque a Policy vai cuidar da autorização
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'owner_name' => 'nullable|string|max:255',
            'is_generic' => 'required|boolean',
            'is_wet' => 'required|boolean',

            // Aerodinâmica
            'front_wing' => 'required|integer|min:0|max:50',
            'rear_wing' => 'required|integer|min:0|max:50',

            // Diferencial
            'diff_on' => 'required|integer|min:10|max:100',
            'diff_off' => 'required|integer|min:10|max:100',

            // Geometria da Suspensão
            'front_camber' => 'required|numeric|min:-3.5|max:2.5',
            'rear_camber' => 'required|numeric|min:-2.0|max:-1.0',
            'front_toe' => 'required|numeric|min:0.00|max:0.20',
            'rear_toe' => 'required|numeric|min:0.10|max:0.25',

            // Suspensão
            'front_suspension' => 'required|integer|min:1|max:41',
            'rear_suspension' => 'required|integer|min:1|max:41',
            'front_anti_roll' => 'required|integer|min:1|max:21',
            'rear_anti_roll' => 'required|integer|min:1|max:21',

            // Altura do Carro
            'front_height' => 'required|integer|min:15|max:35',
            'rear_height' => 'required|integer|min:40|max:60',

            // Freios
            'brake_pressure' => 'required|integer|min:80|max:100',
            'brake_bias' => 'required|integer|min:50|max:70',

            // Pressão dos Pneus
            'front_left_pressure' => 'required|numeric|min:22.5|max:29.5',
            'front_right_pressure' => 'required|numeric|min:22.5|max:29.5',
            'rear_left_pressure' => 'required|numeric|min:20.5|max:26.5',
            'rear_right_pressure' => 'required|numeric|min:20.5|max:26.5',
        ];
    }
}
