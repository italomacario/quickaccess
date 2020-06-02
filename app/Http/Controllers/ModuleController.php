<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Module;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    public function module($id){
        $course = Course::find($id);
        return view('dashboard.module.module', compact('course'));
    }

    public function moduleRegister(Request $request, $id, Module $module){
        $course = Course::find($id);

        $validator = Validator::make($request->all(), $module->rules, $module->messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->with('errors', $validator->errors()->all());
        }

        if($course->modules()->create($request->all())){    
            return redirect()->route('course.list')
                    ->with('success', 'Modulo Cadastrado com Sucesso');
        }

        return redirect()->back()->withInput()
                    ->with('errors', 'Erro ao Cadastrar Modulo');
    }

    public function moduleList($id = ''){
        $modules = Module::with('course')->where('course_id', 'LIKE', '%'.$id.'%')->get();
        return view('dashboard.module.listModule', compact('modules'));
    }

    public function moduleAlter($id){
        $module = Module::find($id);
        return view('dashboard.module.alterModule', compact('module'));
    }

    public function moduleAlterDo(Request $request, $id, Module $moduleM){
        $module = Module::find($id);

        $validator = Validator::make($request->all(), $moduleM->rules, $moduleM->messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->with('errors', $validator->errors()->all());
        }

        if($module->update($request->all())){
            return redirect()->route('module.list', $module->course_id);

        }

        return redirect()->back()->withInput()
                    ->with('errors', 'Erro ao Cadastrar Modulo');
    }

    public function moduleDelete($idmodule, $idcourse){
        $module = Module::find($idmodule);
        if(!$module){
            return redirect()
                        ->route('module.list', $idcourse)
                        ->with('errors', 'Modulo Não Deletado!!!');
        }
        $module->delete();
        return redirect()
                        ->route('module.list', $idcourse)
                        ->with('success', 'Modulo Deletado com Sucesso!');
    }
}
