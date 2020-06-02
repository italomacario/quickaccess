<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\User;
use App\Module;
use App\Lesson;
use File;


class adminController extends Controller
{

    public function index(){
        return view('dashboard.dashboard');
    }
}
