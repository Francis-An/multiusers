<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pharmacy>
 */
class PharmacyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'user_id' => $factory->create(App\User::class)->id,
            'company_name' => $this->faker->company,
            'profile_image' => $this->faker->image('public/storage/',640,480, null, false),
            'cover_image' => $this->faker->image('public/storage/',640,480, null, false),
            'email' => $this->faker->email,
            'address' => $this->faker->streetAddress,
            'phone' => $this->faker->number,
            'liscence' => $this->faker->sentence,
            'founded' =>$this->faker->date,
            'bio' => $this->faker->paragraph,
            'region' => $this->faker->address,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->timezone,
            'created_at' => now(),
        ];
    }
}
