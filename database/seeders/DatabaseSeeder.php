<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $frontend=Category::factory()->create(['name'=>'frontend']);
        $backend=Category::factory()->create(['name'=>'backend']);
        Blog::factory(3)->create(['category_id'=>$frontend->id]);
        Blog::factory(3)->create(['category_id'=>$backend->id]);

        Course::factory()->create(['name'=>'Django']);
        Chapter::factory()->create(['name'=>'Database']);
        Lesson::factory()->create(['name'=>'Django env setup']);
        Comment::factory(5)->create();

        
    }
}

