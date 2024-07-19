<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($course_slug,$chapter_no,$lesson_no) {
        $lessons=$this->getLessons($course_slug,$chapter_no,);
        return view('courses.learn',[
            'lesson'=>$lessons->firstWhere('lesson_no',$lesson_no),
            'course'=>$this->getCourse($course_slug)

        ]);
    }
    protected function getChapter($course_slug,$chapter_no){
        $course=$this->getCourse($course_slug);
        return Chapter::where('course_id',$course->id)
                    ->where('chapter_no',$chapter_no)
                    ->first();
    }
    protected function getCourse($course_slug){
        return Course::firstWhere('slug',$course_slug);
    }
    protected function getLessons($course_slug,$chapter_no){
        $chapter=$this->getChapter($course_slug,$chapter_no);
        return Lesson::where('chapter_id',$chapter->id)->get();
    }
}
