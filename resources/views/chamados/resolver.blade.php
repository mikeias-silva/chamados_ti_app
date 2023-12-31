@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Resolver chamado {{$chamado->titulo}}</h5>
        </div>
        <div class="card-boy">
            <span>Tem certeza que deseja marcar este chamado como resolvido?</span>
        </div>
        <form action="{{route('chamados.resolver', [$chamado->id])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Confirmar</button>
        </form>
    </div>
@endsection
