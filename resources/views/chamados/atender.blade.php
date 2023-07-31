@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Atender chamado {{$chamado->titulo}}</h5>
        </div>
        <div class="card-boy">
            <span>Tem certeza que deseja iniciar atendimento deste chamado?</span>
        </div>
        <form action="{{route('chamados.atender', [$chamado->id])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Confirmar</button>
        </form>
    </div>
@endsection
