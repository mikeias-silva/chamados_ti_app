@extends('layouts.master')
@section('content')
    <form action="{{route('chamados.update', [$chamado->id])}}" method="post">
        @csrf
        @method('PUT')
        @include('chamados.form')
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
@endsection
