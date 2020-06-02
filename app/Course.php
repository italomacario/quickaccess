<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon;

class Course extends Model
{
    protected $fillable = [
        'name', 'description', 'status', 'hourcertificate', 'image', 'user_id', 'video'
    ];

    public $rules = [
        'name'                      => 'required',
        'description'               => 'required',
        'video'                     => 'required',
        'instructor'                => 'required',
        'status'                    => 'required',
        'hourcertificate'           => 'required',
        'photo'                     => 'mimes:jpeg,png,jpg|max:2048|required',
    ];

    public $messages = [
        'name.required' => "O Campo Nome Obrigatorio.",
        'description.required' => "O Campo Descrição é obrigatorio.",
        'video.required' => "O Campo Video é Obrigatorio.",
        'instructor.required' => "O Campo Instrutor Do Curso é Obrigatorio.",
        'status.required' => "O Campo Status Do Curso é Obrigatorio.",
        'hourcertificate.required' => "O Campo Total Horas Certificado é Obrigatorio.",
        'photo.required' => "O Campo Imagem é Obrigatorio.",
        'photo.mimes' => "O campo Imagem deve conter um arquivo do tipo: jpeg, png, jpg.",
    ];


    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function modules(){
        return $this->hasMany(Module::class);
    }
}
