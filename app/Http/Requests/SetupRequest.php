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

    public function messages(): array
    {
        return [
            // Informações Gerais
            'title.required' => 'O nome do setup é obrigatório',
            'title.max' => 'O nome do setup não pode ter mais de 255 caracteres',
            'owner_name.required' => 'O nome do criador é obrigatório.',
            'owner_name.max' => 'O nome do criador não pode ter mais de 255 caracteres',

            // Aerodinâmica
            'front_wing.required' => 'A asa dianteira é obrigatória',
            'front_wing.integer' => 'A asa dianteira deve ser um número inteiro',
            'front_wing.min' => 'A asa dianteira deve ser no mínimo :min',
            'front_wing.max' => 'A asa dianteira deve ser no máximo :max',
            'rear_wing.required' => 'A asa traseira é obrigatória',
            'rear_wing.integer' => 'A asa traseira deve ser um número inteiro',
            'rear_wing.max' => 'A asa traseira deve ser no máximo :max',

            // Diferencial
            'diff_on.required' => 'O diferencial ativo é obrigatório',
            'diff_on.integer' => 'O diferencial ativo deve ser um número inteiro',
            'diff_on.min' => 'O diferencial ativo deve ser no mínimo :min',
            'diff_on.max' => 'O diferencial ativo deve ser no máximo :max',
            'diff_off.required' => 'O diferencial inativo é obrigatório',
            'diff_off.integer' => 'O diferencial inativo deve ser um número inteiro',
            'diff_off.min' => 'O diferencial inativo deve ser no mínimo :min',
            'diff_off.max' => 'O diferencial inativo deve ser no máximo :max',

            // Geometria da Suspensão
            'front_camber.required' => 'A cambagem dianteira é obrigatória',
            'front_camber.numeric' => 'A cambagem dianteira deve ser um número',
            'front_camber.min' => 'A cambagem dianteira deve ser no mínimo :min°',
            'front_camber.max' => 'A cambagem dianteira deve ser no máximo :max°',
            'rear_camber.required' => 'A cambagem traseira é obrigatória',
            'rear_camber.numeric' => 'A cambagem traseira deve ser um número',
            'rear_camber.min' => 'A cambagem traseira deve ser no mínimo :min°',
            'rear_camber.max' => 'A cambagem traseira deve ser no máximo :max°',
            'front_toe.required' => 'O toe dianteiro é obrigatório',
            'front_toe.numeric' => 'O toe dianteiro deve ser um número',
            'front_toe.min' => 'O toe dianteiro deve ser no mínimo :min°',
            'front_toe.max' => 'O toe dianteiro deve ser no máximo :max°',
            'rear_toe.required' => 'O toe traseiro é obrigatório',
            'rear_toe.numeric' => 'O toe traseiro deve ser um número',
            'rear_toe.min' => 'O toe traseiro deve ser no mínimo :min°',
            'rear_toe.max' => 'O toe traseiro deve ser no máximo :max°',

            // Suspensão
            'front_suspension.required' => 'A suspensão dianteira é obrigatória',
            'front_suspension.integer' => 'A suspensão dianteira deve ser um número inteiro',
            'front_suspension.min' => 'A suspensão dianteira deve ser no mínimo :min',
            'front_suspension.max' => 'A suspensão dianteira deve ser no máximo :max',
            'rear_suspension.required' => 'A suspensão traseira é obrigatória',
            'rear_suspension.integer' => 'A suspensão traseira deve ser um número inteiro',
            'rear_suspension.min' => 'A suspensão traseira deve ser no mínimo :min',
            'rear_suspension.max' => 'A suspensão traseira deve ser no máximo :max',
            'front_anti_roll.required' => 'A barra antirrolagem dianteira é obrigatória',
            'front_anti_roll.integer' => 'A barra antirrolagem dianteira deve ser um número inteiro',
            'front_anti_roll.min' => 'A barra antirrolagem dianteira deve ser no mínimo :min',
            'front_anti_roll.max' => 'A barra antirrolagem dianteira deve ser no máximo :max',
            'rear_anti_roll.required' => 'A barra antirrolagem traseira é obrigatória',
            'rear_anti_roll.integer' => 'A barra antirrolagem traseira deve ser um número inteiro',
            'rear_anti_roll.min' => 'A barra antirrolagem traseira deve ser no mínimo :min',
            'rear_anti_roll.max' => 'A barra antirrolagem traseira deve ser no máximo :max',

            // Altura do Carro
            'front_height.required' => 'A altura dianteira é obrigatória',
            'front_height.integer' => 'A altura dianteira deve ser um número inteiro',
            'front_height.min' => 'A altura dianteira deve ser no mínimo :min',
            'front_height.max' => 'A altura dianteira deve ser no máximo :max',
            'rear_height.required' => 'A altura traseira é obrigatória',
            'rear_height.integer' => 'A altura traseira deve ser um número inteiro',
            'rear_height.min' => 'A altura traseira deve ser no mínimo :min',
            'rear_height.max' => 'A altura traseira deve ser no máximo :max',

            // Freios
            'brake_pressure.required' => 'A pressão de freio é obrigatória',
            'brake_pressure.integer' => 'A pressão de freio deve ser um número inteiro',
            'brake_pressure.min' => 'A pressão de freio deve ser no mínimo :min%',
            'brake_pressure.max' => 'A pressão de freio deve ser no máximo :max%',
            'brake_bias.required' => 'O bias de freio é obrigatório',
            'brake_bias.integer' => 'O bias de freio deve ser um número inteiro',
            'brake_bias.min' => 'O bias de freio deve ser no mínimo :min%',
            'brake_bias.max' => 'O bias de freio deve ser no máximo :max%',

            // Pressão dos Pneus
            'front_left_pressure.required' => 'A pressão do pneu dianteiro esquerdo é obrigatória',
            'front_left_pressure.numeric' => 'A pressão do pneu dianteiro esquerdo deve ser um número',
            'front_left_pressure.min' => 'A pressão do pneu dianteiro esquerdo deve ser no mínimo :min PSI',
            'front_left_pressure.max' => 'A pressão do pneu dianteiro esquerdo deve ser no máximo :max PSI',
            'front_right_pressure.required' => 'A pressão do pneu dianteiro direito é obrigatória',
            'front_right_pressure.numeric' => 'A pressão do pneu dianteiro direito deve ser um número',
            'front_right_pressure.min' => 'A pressão do pneu dianteiro direito deve ser no mínimo :min PSI',
            'front_right_pressure.max' => 'A pressão do pneu dianteiro direito deve ser no máximo :max PSI',
            'rear_left_pressure.required' => 'A pressão do pneu traseiro esquerdo é obrigatória',
            'rear_left_pressure.numeric' => 'A pressão do pneu traseiro esquerdo deve ser um número',
            'rear_left_pressure.min' => 'A pressão do pneu traseiro esquerdo deve ser no mínimo :min PSI',
            'rear_left_pressure.max' => 'A pressão do pneu traseiro esquerdo deve ser no máximo :max PSI',
            'rear_right_pressure.required' => 'A pressão do pneu traseiro direito é obrigatória',
            'rear_right_pressure.numeric' => 'A pressão do pneu traseiro direito deve ser um número',
            'rear_right_pressure.min' => 'A pressão do pneu traseiro direito deve ser no mínimo :min PSI',
            'rear_right_pressure.max' => 'A pressão do pneu traseiro direito deve ser no máximo :max PSI',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'nome do setup',
            'owner_name' => 'nome do criador',
            'is_generic' => 'tipo de setup',
            'is_wet' => 'condição da pista',
            'front_wing' => 'asa dianteira',
            'rear_wing' => 'asa traseira',
            'diff_on' => 'diferencial ativo',
            'diff_off' => 'diferencial inativo',
            'front_camber' => 'cambagem dianteira',
            'rear_camber' => 'cambagem traseira',
            'front_toe' => 'toe dianteiro',
            'rear_toe' => 'toe traseiro',
            'front_suspension' => 'suspensão dianteira',
            'rear_suspension' => 'suspensão traseira',
            'front_anti_roll' => 'barra antirrolagem dianteira',
            'rear_anti_roll' => 'barra antirrolagem traseira',
            'front_height' => 'altura dianteira',
            'rear_height' => 'altura traseira',
            'brake_pressure' => 'pressão de freio',
            'brake_bias' => 'bias de freio',
            'front_left_pressure' => 'pressão pneu dianteiro esquerdo',
            'front_right_pressure' => 'pressão pneu dianteiro direito',
            'rear_left_pressure' => 'pressão pneu traseiro esquerdo',
            'rear_right_pressure' => 'pressão pneu traseiro direito',
        ];
    }
}