@extends('layouts.master')
@section('content')
    @include('messages.messages')
    <a href="{{route('categorias.create')}}" class="btn btn-primary m-4">Nova Categoria</a>
    <div class="">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categorias as $item)
                <tr>
                    <td><a href="{{route('categorias.show', [$item->id])}}"> {{$item->nome}}</a></td>
                    <td><a href="{{route('categorias.edit', [$item->id])}}">Editar</a>
                        <a href="{{route('categorias.delete', [$item->id])}}">Deletar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
