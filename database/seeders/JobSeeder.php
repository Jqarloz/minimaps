<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Menus\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = Job::factory(200)->create();

        foreach ($jobs as $job) {
            Image::factory(1)->jobUrl()->create([
                'imageable_id' => $job->id,
                'imageable_type' => Job::class
            ]);

            $job->tags()->attach(
                rand(1,6),
                [
                    'taggable_id' => $job->id,
                    'taggable_type' => Job::class
                ]
            );
            $job->tags()->attach(
                rand(6,12),
                [
                    'taggable_id' => $job->id,
                    'taggable_type' => Job::class
                ]
            );
        }
    }
}
