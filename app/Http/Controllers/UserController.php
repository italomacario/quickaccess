<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function userList(){
        $users = User::all();
        return view('dashboard.user.listuser', compact('users'));
    }

    public function AlterarUsuario(Request $request, $id){
        $user = User::find($id);

        if($user->update($request->all())){
            return redirect()
                        ->route('user.list')
                        ->with('success', 'Atualizado com Sucesso!');
        }

        return redirect()
                        ->route('user.list')
                        ->with('errors', 'Erro ao Alterar Usuario!');
    }

    public function profile(){
        return view('site.profile');
    }

    public function profilealter(Request $request){
        $user = Auth()->user();

        $data = [
            'name' => $request->name,
        ];

        if(!is_null($request->password)){
            if(Hash::check($request->password, Auth()->user()->password)){
                if($request->newpassword == $request->confirmnewpassword){
                    $data['password'] = hash::make($request->newpassword);
                }
            }
        };


        if($request->image && $request->file('image')->isValid()){
            $extension = $request->image->getClientOriginalExtension();
            $nameImage = time().'.'.$extension;
            $data['image'] = $nameImage;
            $upload = $request->image->storeAs('user', $nameImage);
        }

        if($user->update($data)){
            return redirect()->route('profile')->with('success', 'Usuario Atualizado com Sucesso!');
        }
        return redirect()->route('profile')->with('error', 'Erro ao alterar Usuario. Tente novamente');
    }
}
