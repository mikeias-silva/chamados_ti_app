@extends('layouts.master')
@section('content')
    @include('messages.messages')
    <a href="{{route('chamados.create')}}" class="btn btn-primary m-4">Novo Chamado</a>
    <div class="">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Descrição</th>
                <th>Data abertura</th>
                <th>Situação</th>
                <th>Prazo</th>
                <th>Usuario</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chamados as $item)
                <tr>
                    <td><a href="{{route('chamados.show', [$item->id])}}"> {{$item->titulo}}</a></td>
                    <td>{{$item->descricao}}</td>
                    <td>{{ $item->presenter()->dataCriacao($item->data_criacao) }}</td>
                    <td>{{ $item->presenter()->prazoSolucao($item->prazo_solucao) }}</td>
                    <td>{{ $item->situacao->presenter()->nome($item->situacao->nome) }}</td>
                    <td>{{$item->usuario->name}}</td>
                    <td><a href="{{route('chamados.edit', [$item->id])}}">Editar</a>
                        <a href="{{route('chamados.delete', [$item->id])}}">Deletar</a>
                        <a href="{{route('chamados.iniciar_atendimento', [$item->id])}}">Atendimento</a>
                        <a href="{{route('chamados.marcar_resolvido', [$item->id])}}">Resolver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
