
@extends('base')

@section('titulo', ' Catalogo de Filmes')

@section('conteudo')
<p>
    <a href="{{ route ('usuarios.cadastrar')}}" class="px-4 py-1 text-white font-light tracking-wider bg-blue-800 rounded">
    <i class=" fas fa-plus mr-3"></i>Cadastrar usuario</a>
</p>
<p> Veja nossa lista de clientes</p>

    <table border="1">
        <tr>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Username</th>
            {{-- <th>Password</th> --}}
            <th>admin</th>
        </tr>
        @foreach($usuarios as $usuario)  

         <tbody class="text-gray-700">
         <tr @if($loop->even) class="bg-gray-200" @endif>
            <td class="text-left py-3 px-4">{{$usuario['name']}}</td>
            <td class="text-left py-3 px-4">{{$usuario['email']}}</td>
            <td class="text-left py-3 px-4">{{$usuario['username']}}</td>
            {{-- <td>{{$usuario['password']}}</td> --}}
            <td class="text-left py-3 px-4">{{$usuario['admin']}}</td>
            <td class="text-left py-3 px-4"><a class="inline-block px-3 py-1 font-semibold text-green-900 leading-tight bg-red-400 opacity-100 rounded-full" href="{{route('usuarios.apagar', $usuario['id'])}}">Apagar</a></td>
            <td class="text-left py-3 px-4"><a class="inline-block px-3 py-1 font-semibold text-green-900 leading-tight bg-green-400 opacity-100 rounded-full" href="{{route('usuarios.editar', $usuario['id'])}}">Editar</a></td>
        </tr>
        @endforeach
    </table>

@endsection
