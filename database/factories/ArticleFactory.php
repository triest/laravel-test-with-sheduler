<?php

    /** @var \Illuminate\Database\Eloquent\Factory $factory */

    use App\Article;
    use Faker\Generator as Faker;
    use Illuminate\Support\Str;

    $factory->define(
            Article::class,
            function (Faker $faker) {
                $title = $faker->sentence();
                $slug = Str::slug($title, '-');
                return [
                    //
                        'title' => $title,
                        'slug' =>$slug,
                        'description' => $faker->text(200)
                ];
            }
    );
