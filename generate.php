<?php
require_once 'vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create('en_NG');

$uniqueMatricNumbers = [];

for($i = 0; $i <= 100; $i++)
{
        // Generate a unique matric number
    do
    {
        $matric = 'H/CTE/22/' . rand(1001, 9999);
    }
    while (in_array($matric, $uniqueMatricNumbers));

    $uniqueMatricNumbers[] = $matric;

    // Generate a Nigerian-style name
    $name = $faker->name();

    // Generate random level and department IDs
    $levelId = rand(1, 6);
    $departmentId = rand(1, 32);

    echo "INSERT INTO Students (name, matric, level, department) VALUES ('$name', '$matric', $levelId, $departmentId);\n";
}
// echo $faker->name();
// 'Vince Sporer'



