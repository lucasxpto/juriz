<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Communication>
 */
class CommunicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'api_comunicacao_id' => $this->faker->uuid,
            'data_disponibilizacao' => $this->faker->date(),
            'sigla_tribunal' => $this->faker->word,
            'tipo_comunicacao' => $this->faker->word,
            'nome_orgao' => $this->faker->word,
            'texto' => $this->faker->text,
            'numero_processo' => $this->faker->word,
            'meio' => $this->faker->word,
            'link' => $this->faker->url,
            'tipo_documento' => $this->faker->word,
            'nome_classe' => $this->faker->word,
            'codigo_classe' => $this->faker->word,
            'numero_comunicacao' => $this->faker->randomNumber(),
            'ativo' => $this->faker->boolean,
            'hash' => $this->faker->word,
            'status' => $this->faker->word,
            'motivo_cancelamento' => $this->faker->word,
            'data_cancelamento' => $this->faker->date(),
            'data_envio' => $this->faker->date(),
            'meiocompleto' => $this->faker->word,
            'numeroprocessocommascara' => $this->faker->word,
            'notificado_email' => $this->faker->boolean,
            'notificado_whatsapp' => $this->faker->boolean,
        ];
    }
}
