<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EntryMode>
 */
class EntryModeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Entry_modename' => $this->faker->unique(),
            'crdr' => $this->faker,
            'entrymodeno' => $this->faker,
        ];
    }
}
