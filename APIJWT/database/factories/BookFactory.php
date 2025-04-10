<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use Faker\Factory as FakerFactory; // Manually import Faker

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = FakerFactory::create('en_US');
        $englishWords = ['Amazing ', 'Incredible ', 'Fantastic ', 'Wonderful ', 'Brilliant ', 'Epic ', 'Legendary ', 'Unforgettable ', 'Spectacular ', 'Magical '];
        $cover = 'https://picsum.photos/250/325';
        return [
            'cover' => $cover,
            'title' => 'The ' . $faker->randomElement($englishWords) . $faker->randomElement([$faker->lastName(), $faker->colorName(), $faker->firstName(), $faker->city()]),
            'author' => $faker->name(),
            'genre' => $faker->randomElement(['F', 'NF']),
            'description' => $faker->realText(50),
        ];
    }
}
