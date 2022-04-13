<?php

namespace Database\Factories;

use App\Enums\DocumentTypeEnum;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement([DocumentTypeEnum::CPF, DocumentTypeEnum::CNPJ]),
            'document' => $this->faker->numerify('#########'),
        ];
    }
}
