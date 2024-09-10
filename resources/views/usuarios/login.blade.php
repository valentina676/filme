@extends('base')

@section('titulo', 'Login')

@section('conteudo')



@if($errors->any())
<div>
    <h4>Deu ruim</h4>
    @foreach($errors-> all() as $erro)
        <p>{{$erro}}</p>
    @endforeach
</div>
@endif

<form  action="{{route('login')}}" class="p-10 bg-white rounded shadow-xl" method="post">
    @csrf
    <div class="">
        <label class="block text-sm text-gray-600" for="username">Usuario</label>
        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="username" name="username" type="text" required="" placeholder="Usuario" aria-label="Usuario">
    </div>
    <div class="mt-2">
        <label class="block text-sm text-gray-600" for="password">Senha</label>
        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="Senha" aria-label="Senha">
    </div>
    <div class="mt-6">
        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Entrar</button>
    </div>

</form>

@endsection