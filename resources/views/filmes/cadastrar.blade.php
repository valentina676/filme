
@extends('base')

@section('titulo', 'Cadastrar | Catalogo de Filmes')

@section('conteudo')
<p>Preencha o formulário</p>

@if($errors->any())
<div >
    <h4>Deu ruim</h4>
    @foreach($errors-> all() as $erro)
        <p>{{$erro}}</p>
    @endforeach
</div>
@endif
<div class="leading-loose">

<form class="p-10 bg-white rounded shadow-xl" method="post" enctype="multipart/form-data" action="{{route('filmes.gravar') }}">
    @csrf
    <label class="block text-sm text-gray-600" for="nome">Nome</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="nome" placeholder="Nome" value="{{old('nome')}}">
    <br>
    <label class="block text-sm text-gray-600" for="sinopse">Sinopse</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="sinopse" placeholder="Sinopse" value="{{old('sinopse')}}" >
    <br>
    <label class="block text-sm text-gray-600" for="ano">Ano</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="number" name="ano" placeholder="Ano" value="{{old('ano')}}">
    <br>
    <label class="block text-sm text-gray-600" for="categoria">Categoria</label>
    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="categoria" placeholder="Categoria" value="{{old('categoria')}}">
        <option>Ação</option>
        <option>Aventura</option>
        <option>Terror</option>
        <option>Comédia</option>
        <option>Suspense</option>
        <option>Drama</option>
        <option>Romance</option>
        <option>Animação</option> 
    </select>
    <br>
     <label class="block text-sm text-gray-600" for="imagem">Imagem</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="imagem" type="file" name="imagem" placeholder="imagem" > 
    <br>    
    <label class="block text-sm text-gray-600" for="link">Link</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="link" placeholder="Link" value="{{old('link')}}" > 
    
    <main class="w-full flex-grow p-6">
    <input class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"  type="submit" value="Gravar">
</form>
</div>
@endsection