<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;


class Lesson extends Model
{
    protected $fillable = [
        'name', 'description', 'lesson'
    ];

    public $rules = [
        'name'        => 'required',
        'description' => 'required',
        'lesson'      => 'required',   
    ];

    public $messages = [
        'name.required' => "O Campo Nome Obrigatorio.",
        'description.required' => "O Campo Descrição é obrigatorio.",
        'lesson.required' => 'O Campo de Video Aula é Obrigatorio.'
    ];

    public function module(){
        return $this->belongsTo(Module::class);
    }
}
