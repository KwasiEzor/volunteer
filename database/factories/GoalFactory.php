<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goal>
 */
class GoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = ucwords($this->faker->sentence(rand(3,6)));


        $content = '';
        for($i=0; $i<5; $i++){
            $content .='<p>'.$this->faker->sentences(rand(5,8),true).'</p>';
        }
        return [
            'title'=>$title,
            'description'=>$this->faker->sentence(),
            'content'=>$content,
        ];
    }
}
