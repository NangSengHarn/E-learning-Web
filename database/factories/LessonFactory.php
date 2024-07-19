<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\Course;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chapter_id'=>Chapter::factory(),
            'lesson_no'=>$this->faker->randomNumber(),
            'name'=>$this->faker->sentence(),
            'slug'=>$this->faker->slug(),
            'video'=>storage_path('\app\public\lesson_videos\lesson_1.mp4'),
            'source_code'=>$this->faker->word.'.pdf'
        ];
    }
}
