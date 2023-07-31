@extends('layouts.master')
@section('content')
    <form action="{{route('situacoes.update', [$situacao->id])}}" method="post">
        @csrf
        @method('PUT')
        @include('situacoes.form')
    </form>
@endsection
