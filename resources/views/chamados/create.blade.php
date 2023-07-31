@extends('layouts.master')
@section('content')
    <form action="{{route('chamados.store')}}" method="post">
        @csrf
        @include('chamados.form')
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
@endsection
