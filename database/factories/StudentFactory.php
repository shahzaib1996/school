<?php
use Faker\Generator as Faker;
$factory->define(App\Student::class, function (Faker $faker) {
	return [
		'student_fname' => $faker->word,
		'student_lname' => $faker->word,
		'date_of_birth' => "2019-04-30",
		'gender' => 1,
		'place_of_birth' => $faker->word,
		'class_req' => $faker->numberBetween(1,10),
		'monthly_fees' => $faker->numberBetween(500,2000),
		'annual_charges' => 15000,
		'student_pic_path' => "avatar5.png",
		'parent_id' => 1
	];
});