@extends('layouts.master')
@section('content')
    <form action="{{route('categorias.update', [$categoria->id])}}" method="post">
        @csrf
        @method('PUT')
        @include('categorias.form')
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
@endsection
