<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectType>
 */
class ProjectTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $name = $this->faker->sentence(3,6);
        $description = '';
        $prerequisits = '';
        for($i=0; $i<5; $i++){
            $description .='<p>'.$this->faker->sentences(rand(3,6),true).'</p>';
        }
        for($i=0; $i<5; $i++){
            $prerequisits .='<p>'.$this->faker->sentences(rand(5,8),true).'</p>';
        }
        return [
            'name'=>$name,
            'description'=>$description,
            'prerequisits'=>$prerequisits,
        ];
    }
}
