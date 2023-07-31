@extends('layouts.master')
@section('content')
    @include('messages.messages')
    <a href="{{route('situacoes.create')}}" class="btn btn-primary m-4">Novo situação</a>
    <div class="">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($situacoes as $item)
                <tr>
                    <td><a href="{{route('situacoes.show', [$item->id])}}"> {{$item->nome}}</a></td>
                    <td><a href="{{route('situacoes.edit', [$item->id])}}">Editar</a>
                        <a href="{{route('situacoes.delete', [$item->id])}}">Deletar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
