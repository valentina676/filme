@extends('base')

@section('titulo', 'Catalogo de Filmes')

@section('conteudo')
<p>
    <a href="{{ route ('filmes.cadastrar')}}" class="px-4 py-1 text-white font-light tracking-wider bg-blue-800 rounded">
    <i class=" fas fa-plus mr-3"></i>Cadastrar filme</a>
</p>
<p> Veja nossa lista de filmes</p>

    <table class="min-w-full bg-white" border="1">
        <thead class="bg-gray-800 text-white">
        <tr>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Sinopse</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Ano</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Categoria</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Imagem</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Link</th>
        </tr>
        </thead>
        @foreach($filmes as $filme)

        <tbody class="text-gray-700">
        <tr @if($loop->even) class="bg-gray-200" @endif>
            <td class="text-left py-3 px-4">{{$filme['nome']}}</td>
            <td class="text-left py-3 px-4">{{$filme['sinopse']}}</td>
            <td class="text-left py-3 px-4">{{$filme['ano']}}</td>
            <td class="text-left py-3 px-4">{{$filme['categoria']}}</td>
            <td class="text-left py-3 px-4">{{$filme['imagem']}}</td>
            <td class="text-left py-3 px-4">{{$filme['link']}}</td>
            <td class="text-left py-3 px-4"><a class="inline-block px-3 py-1 font-semibold text-green-900 leading-tight bg-red-400 opacity-100 rounded-full"href="{{route('filmes.apagar', $filme['id'])}}">Apagar</a></td>
            <td class="text-left py-3 px-4"><a class="inline-block px-3 py-1 font-semibold text-green-900 leading-tight bg-blue-400 opacity-100 rounded-full" href="{{route('filmes.editar', $filme['id'])}}">Editar</a></td>
        </tr>
        </tbody>
        @endforeach
    </table>

    



@endsection