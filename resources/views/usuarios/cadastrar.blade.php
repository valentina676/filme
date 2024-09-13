
@extends('base')

@section('titulo', 'Cadastrar | Catalogo de filmes')

@section('conteudo')
<p>Preencha o formulário</p>

@if($errors->any())
<div>
    <h4>Deu ruim</h4>
    @foreach($errors-> all() as $erro)
        <p>{{$erro}}</p>
    @endforeach
</div>
@endif
<div class="leading-loose">
<form  class="p-10 bg-white rounded shadow-xl" method="post" action="{{route('usuarios.gravar') }}">
    @csrf
    <label class="block text-sm text-gray-600" for="name">Name</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="name" placeholder="Digite seu nome" value="{{old('name')}}">
    <br>
    <label class="block text-sm text-gray-600" for="email">Email</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="email" placeholder="Digite seu email" value="{{old('email')}}" >
    <br>
    <label class="block text-sm text-gray-600" for="username">Username</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="username" placeholder="Digite o seu username" value="{{old('username')}}" >
    <br> 
   
    <label class="block text-sm text-gray-600" for="password">Senha</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" t ype="password" name="password" placeholder="Digite a sua senha" value="{{old('password')}}" >
    <label for="admin">Admin</label>
     <select name="admin" id="admin"> 
     <option value="1">Sim</option>
     <option value="0">Não</option>
     </select>
     <br>
    <main class="w-full flex-grow p-6">
    <input class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"  type="submit" value="Gravar">
    <br>
</form>
@endsection

    


          
   
     <br>



