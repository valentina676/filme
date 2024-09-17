<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index(){
        $dados = Filme::all();
        return view('filmes.index',[
            'filmes' => $dados,
        ]);
    }

    public function cadastrar(){
        return view ('filmes.cadastrar');
    }
    public function gravar(Request $form)
    {#vai chamar a function gravar/submeter formulário
        $img = $form->file('imagem')->store('filmes', 'imagens');
        
        $dados = $form->validate([
        
            'nome' => 'required|min:3',
            'sinopse' => 'required',
            'ano'=> 'required',
            'categoria'=> 'required',
            'imagem' => 'required',
            'link' => 'required'

        ]);

        $dados['imagem'] = $img;

        Filme::create($dados);
       
        return redirect()->route('filmes');
    }

    public function apagar(Filme $filme){ //apagar vai mostrar tela a confirmação 
        return view('filmes.apagar', [
            'filme'=> $filme,
        ]);
    }

    public function deletar(Filme $filme)//deletar vai apagar tudo do banco 
    {
        $filme->delete();
        return redirect()->route('filmes');
    }

    public function editar(Filme $filme) {
        return view('filmes/editar', ['filme' => $filme]);
       }
       public function editarGravar(Request $form, Filme $filme)
        {
        $dados = $form->validate([
        'nome' => 'required|max:255',
        'sinopse' => 'required',
        'ano'=> 'required',
        'categoria'=> 'required',
        'imagem' => 'required',
        'link' => 'required'
        ]);

        $filme->fill($dados);
        $filme->save();
        return redirect()->route('filme');
        }
}
