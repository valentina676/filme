@extends('base')
@section('titulo', 'Catalogo de filmes - Editar')
@section('conteudo')

 <h1>Filmes - Editar</h1>
 @if ($errors->any())
 <p>Preencha os campos corretamente.</p>

 <ul>
 @foreach($errors->all() as $erro)
 <li>{{ $erro }}</li>
 @endforeach
 </ul>

 @endif
 <form action="{{ route('filmes.editar', $filme->id) }}" method="post">
 @csrf

 @method('put')
 <p><input value="{{ old('nome', $filme->nome ?? '') }}" type="text" nome="nome" placeholder="Nome do filme" value=""></p>
 <p><input value="{{ old('sinopse', $filme->sinopse ?? '') }}" type="text" nome="sinopse" placeholder="Sinopse"></p>
 <p><input value="{{ old('ano', $filme->ano ?? '') }}" type="text" nome="ano" placeholder="Ano do filme"></p>
 <p><input value="{{ old('categoria', $filme->categoria ?? '') }}" type="text" nome="categoria" placeholder="categoria"></p>
 <p><input value="{{ old('imagem', $filme->imagem ?? '') }}" type="text" nome="imagem" placeholder="Imagem"></p>
 <p><input value="{{ old('link', $filme->link ?? '') }}" type="text" nome="link" placeholder="Link"></p>
 <p><input type="submit" value="Gravar"></p>
 </form>
@endsection