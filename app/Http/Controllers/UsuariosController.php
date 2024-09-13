<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

    public function index()
    {
        $dados = Usuario::orderBy('name', 'asc')->get();
        return view('usuarios.index', [
            'usuarios' => $dados,
        ]);
    }

    public function cadastrar()
    {
        return view('usuarios.cadastrar');
    }
    public function gravar(Request $form)
    { #vai chamar a function gravar/submeter formulário

        $dados = $form->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3|unique:usuarios',
            //unique -> faz com que não cadastre o msm email
            'username' => 'required|min:3',
            'password' => 'required|min:3',
            'admin' => 'boolean',
        ]);

        $dados['password'] = Hash::make($dados['password']);

        // dd($dados); -> ver se esta funcionando

        Usuario::create($dados);

        return redirect()->route('usuarios');
    }

    public function apagar(Usuario $usuario)
    { //apagar vai mostrar tela a confirmação 
        return view('usuarios.apagar', [
            'usuario' => $usuario,
        ]);
    }

    public function deletar(Usuario $usuario) //deletar vai apagar tudo do banco 
    {
        $usuario->delete();
        return redirect()->route('usuarios');
    }

    public function editar(Usuario $usuario)
    {
        return view('usuarios/editar', ['usuario' => $usuario]);
    }
    public function editarGravar(Request $form, Usuario $usuario)
    {
        $dados = $form->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'username' => 'required|min:3',
            'password' => 'required|min:3',
            'admin' => 'boolean',
        ]);

        $usuario->fill($dados);
        $usuario->save();
        return redirect()->route('usuarios');
    }
    public function login(Request $form)
    {
        if ($form->isMethod('POST')) {
            $credenciais = $form->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
            //tenta fazer o login
            if (Auth::attempt($credenciais)) {
                return redirect()->intended(route('index'));
            } else {
                return redirect()->route('login')
                    ->with('erro', 'Usuario ou senha invalidos');
            }
        }

        return view('usuarios.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}