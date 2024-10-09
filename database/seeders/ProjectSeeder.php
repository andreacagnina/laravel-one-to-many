<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use illuminate\support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 25; $i++) {
            $project = new Project();
            $project->name = $faker->sentence(3);
            $project->description = $faker->text(500);
            $project->slug = Str::slug($project->name, '-');
            $project->start_date = $faker->date();
            $project->end_date = $faker->date();

            $project->save();
        }
    }
}
