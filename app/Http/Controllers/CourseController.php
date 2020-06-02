<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Course;
use App\Module;
use App\User;
use File;
use Auth;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

    public function course()
    {
        $users = User::where('accesslevel', 'Instrutor')->get();
        return view('dashboard.course.course', compact('users'));
    }

    public function courseRegister(Request $request, Course $course)
    {
        $user = User::find($request->instructor);
        $validator = Validator::make($request->all(), $course->rules, $course->messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->with('errors', $validator->errors()->all());
        }

        $extension = $request->photo->getClientOriginalExtension();
        $nameImage = time() . '.' . $extension;
        $request['image'] =  $nameImage;
        $upload = $request->photo->storeAs('course', $nameImage);
        if (!$upload) {
            return redirect()->back()
                ->with('errors', 'Falha ao fazer Upload da Imagem');
        }

        if ($user->course()->create($request->all())) {
            return redirect()->route('course.list')->with('success', 'Curso Cadastrado com Sucesso');
        }
    }

    public function courseList()
    {
        $courses = Course::all();
        return view('dashboard.course.listCourse', compact('courses',));
    }

    public function courseAlter($id)
    {
        $users = User::where('accesslevel', 'Instrutor')->get();
        $course = Course::find($id);
        return view('dashboard.course.AlterCourse', compact('course', 'users'));
    }

    public function courseAlterDo(Request $request, $id, Course $course)
    {
        $validator = Validator::make($request->all(), $course->rules, $course->messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->with('errors', $validator->errors()->all());
        }

        $course = Course::find($id);
        if ($request->photo && $request->file('photo')->isValid()) {
            Storage::delete('course/' . $course->image);
            $extension = $request->photo->getClientOriginalExtension();
            $nameImage = time() . '.' . $extension;
            $request['image'] =  $nameImage;
            $upload = $request->photo->storeAs('course', $nameImage);
            if (!$upload) {
                return redirect()->back()
                    ->with('errors', 'Falha ao fazer Upload da Imagem');
            }
        }

        if($course->update($request->all())){
            return redirect()
                ->route('course.list')
                ->with('success', 'Atualizado com Sucesso!');
        }

        return redirect()->back()
                    ->with('errors', 'Não foi Possivel Alterar o Usuario');

    }

    public function courseDelete($idcourse)
    {
        $course = Course::find($idcourse);
        if (!$course) {
            return redirect()
                ->route('course.list')
                ->with('errors', 'Curso Não Deletado!!!');
        }
        $course->delete();
        return redirect()
            ->route('course.list')
            ->with('success', 'Curso Deletado com Sucesso!');
    }

    public function courses($search = '')
    {
        $courses = Course::where('name', 'like', '%' . $search . '%')->get();
        $users = User::where('accesslevel', 'Instrutor')->get();
        return view('site.courses', compact('courses', 'users'));
    }

    public function searchCourses(Request $request)
    {
        return redirect()
            ->route('courses', $request->search);
    }

    public function courseOne($id)
    {
        $course = Course::where('id', $id)->with('user', 'modules', 'modules.lessons')->first();
        //dd($course);
        return view('site.course', compact('course'));
    }

    public function myCourses()
    {
        $user = Auth::user();
        $courses = $user->courses()->get();
        return view('site.mycourses', compact('courses'));
    }
}
