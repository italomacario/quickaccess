<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Module;
use App\Course;
use Auth;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{
    public function lesson($id){
        $module = Module::find($id);
        return view('dashboard.lesson.lesson', compact('module'));
    }

    public function lessonRegister(Request $request, $id, Lesson $LessonM){
        $module = Module::find($id);
        $validator = Validator::make($request->all(), $LessonM->rules, $LessonM->messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->with('errors', $validator->errors()->all());
        }

        if($module->lesson()->create($request->all())){
            return redirect()->route('module.list', $module->course_id)->with('success', 'Aula Cadastrada com Sucesso');
        }
    }

    public function lessonList($id = ''){
        $lessons = Lesson::with('module')->where('module_id', 'LIKE', '%'.$id.'%')->get();
        return view('dashboard.lesson.listLesson', compact('lessons'));
    }

    public function lessonAlter($id){
        $lesson = Lesson::find($id);
        return view('dashboard.lesson.alterLesson', compact('lesson'));
    }

    public function lessonAlterDo(Request $request, $id, Lesson $LessonM){
        $lesson = Lesson::find($id);

        $validator = Validator::make($request->all(), $LessonM->rules, $LessonM->messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->with('errors', $validator->errors()->all());
        }
        if($lesson->update($request->all())){
            return redirect()->route('lesson.list', $lesson->module_id)->with('success', 'Aula Alterada com Sucesso');
        }
    }

    public function lessonDelete($idlesson, $idmodule){
        $lesson = Lesson::find($idlesson);
        if(!$lesson){
            return redirect()
                        ->route('lesson.list', $idmodule)
                        ->with('errors', 'Error ao Deletar Aula!');
        }
        $lesson->delete();
        return redirect()
                        ->route('lesson.list', $idmodule)
                        ->with('success', 'Aula Deletada com Sucesso!');
    }

    public function lessonview($course_id, $id_lesson){
        $user = Auth::user();
        $courses = $user->courses->where('id', $course_id)->first();
        if(!$courses){
            $user->courses()->attach($course_id);
        }
        $course = Course::where('id', $course_id)->with('user', 'modules', 'modules.lessons')->first();
        $lesson = Lesson::find($id_lesson);
        return view('site.lesson', compact('course', 'lesson'));
    }
}
