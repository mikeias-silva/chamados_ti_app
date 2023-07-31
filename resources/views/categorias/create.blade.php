@extends('layouts.master')
@section('content')
    <form action="{{route('categorias.store')}}" method="post">
        @csrf
        @include('categorias.form')
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
@endsection
