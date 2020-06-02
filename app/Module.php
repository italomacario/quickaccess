<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lesson;
use App\Course;

class Module extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public $rules = [
        'name'          => 'required',
        'description'   => 'required',
    ];

    public $messages = [
        'name.required' => "O Campo Nome Obrigatorio.",
        'description.required' => "O Campo Descrição é obrigatorio.",
    ];



    public function lesson(){
        return $this->hasMany(Lesson::class);
    }

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
