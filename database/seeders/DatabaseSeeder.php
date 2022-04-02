<?php

namespace Database\Seeders;

use App\Models\Goal;
use App\Models\User;
use App\Models\Image;
use App\Models\Project;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
                
        $projects = Project::factory(40)->create()->each(function($project){
            $goals = Goal::factory(rand(4,10))->create([
                'goallable_type'=>'App\Models\Project',
                'goallable_id'=>$project->id,
            ]);
            $images= Image::factory(1)->create([
                'imageable_type'=>'App\Models\Project',
                'imageable_id'=>$project->id
            ]);

            $project->goals($goals);
            $project->images($images);
        });
        User::factory(20)->create()->each(function($user) use($projects){
            $user->projects()->attach(
                $projects->random((rand(1,9) > 5))
            );
            $image= Image::factory(1)->create([
                'imageable_type'=>'App\Models\User',
                'imageable_id'=>$user->id
            ]);
            $user->images($image);
            $subscriptions = Subscription::factory(rand(1,3))->create([
                'subscribeable_type'=>'App\Models\User',
                'subscribeable_id'=>$user->id,
            ]);
            $user->subscriptions($subscriptions);
        });

        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
