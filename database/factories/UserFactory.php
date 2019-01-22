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
        'about_the_company' => $faker->text,

    ];
});


/*$agent->agent_id = $request->input('agent_id');
        $agent->name = $request->input('name');
        $agent->logo = $request->input('logo');
        $agent->location = $request->input('location');
        $agent->phone_num_1 = $request->input('phone_num_1');
        $agent->phone_num_2 = $request->input('phone_num_2');
        $agent->email = $request->input('email');
        $agent->company_name = $request->input('company_name');
        $agent->about_the_company = $request->input('about_the_company');

