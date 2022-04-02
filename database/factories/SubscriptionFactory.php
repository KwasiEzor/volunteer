<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'project_id'=>function(){
                if($project =Project::inRandomOrder()->first()){
                    return $project->id;
                }
                return Project::factory()->create();
            },
            'amount'=>$this->faker->numberBetween(10000,30000),
        ];
    }
}
