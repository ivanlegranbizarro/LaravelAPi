<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'user_id' => User::all()->random()->id,
      'title' => $title = $this->faker->words(3, true),
      'slug' => Str::slug($title),
      'content' => $this->faker->paragraphs(3, true),
    ];
  }
}
