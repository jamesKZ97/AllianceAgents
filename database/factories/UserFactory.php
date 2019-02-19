<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Agent::class, function (Faker $faker) {
    return [
        'agent_id' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
        'name' => $faker->name,
        'logo' => $faker->numerify('url ###'),
        'location' => $faker->unique()->address,
        'phone_num_1' => $faker->e164PhoneNumber,
        'phone_num_2' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->email,
        'company_name' => $faker->company,
        'about_the_company' => $faker->text(50),
        'company_address' => $faker->unique()->address,
        'client_testimonial' => $faker->text(50),
        'year_of_exp' => $faker->randomDigit,
        'person_recommended' => $faker->name,
        'quote' => $faker->text(50),
        'pos_of_person_recommended' => $faker->jobTitle,
        'personal_description' => $faker->text(50)

    ];
});


