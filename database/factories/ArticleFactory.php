<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = DB::table('categories')
        ->inRandomOrder()
        ->limit(1)
        ->first(['id']);
        $title = $this->faker->words(2, true);
        return [
            //
            'title' => $title,
            'short_description' => $this->faker->words(7, true),
            'full_description' => $this->faker->words(200, true),
            'image' => $this->faker->imageUrl(),
            'category_id' => $category? $category->id : null,
        ];
    }
}
