<?php

namespace Database\Factories;

use App\Models\ProjectType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(5,7);
        $description = '';
        for($i=0; $i<5; $i++){
            $description .='<p>'.$this->faker->sentences(rand(5,8),true).'</p>';
        }

        $datetime = $this->faker->dateTimeBetween('- 1 month','+ 12 month');
        return [
            'code'=>'',
            'title'=>$title,
            'project_type_id'=> function(){
                if($projectType =ProjectType::inRandomOrder()->first()){
                    return $projectType->id;
                }
                return ProjectType::factory()->create();
            },
            'location'=>$this->faker->country(),
            'estimated_duration'=>rand(1,3).' semaines',
            'max_size'=>rand(10,20),
            'description'=>$description,
            'estimated_budget'=>rand(50000,500000),
            'price'=>rand(25000,60000),
            'start_at'=>$datetime,
            'end_at'=>$datetime,
            'is_highlighted'=>(rand(1,9) > 7),
            'apply_link'=>$this->faker->url(),
            
        ];
    }
}
