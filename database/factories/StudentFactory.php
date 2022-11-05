<?php

namespace Database\Factories;

use App\Models\student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class StudentFactory extends Factory
{


    protected $model = student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'nic'=>$this->faker->numerify('#########V'),
            'phone'=>$this->faker->numerify('07########'),
            'phone1'=>$this->faker->numerify('07########'),
            'parent_contact'=>$this->faker->numerify('07########'), 
            'email'=>$this->faker->email, 
            'dob'=>$this->faker->date,
            'address'=>$this->faker->address,
            'parent_name'=>$this->faker->name,
            'gender'=>$this->faker->shuffle('1','2')
        ];
    }
}
