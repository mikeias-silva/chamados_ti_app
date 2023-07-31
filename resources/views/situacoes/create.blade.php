@extends('layouts.master')
@section('content')
    <form action="{{route('situacoes.store')}}" method="post">
        @csrf
        @include('situacoes.form')
    </form>
@endsection
