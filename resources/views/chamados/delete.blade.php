@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Deletar {{$chamado->titulo}}</h5>
        </div>
        <div class="card-boy">
            <span>Tem certeza que deseja deletar?</span>
        </div>
        <form action="{{route('chamados.destroy', [$chamado->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    </div>
@endsection
