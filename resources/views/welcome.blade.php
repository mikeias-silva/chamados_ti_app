@extends('layouts.app')
@section('content')
        <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Bem-vindo ao Sistema de Chamados!</h2>
                        <p class="card-text">Este é um sistema de chamados onde você pode criar, visualizar e gerenciar
                            seus chamados de forma simples e eficiente.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Realizar Login</a>
                    </div>
                </div>
        </div>
@endsection
