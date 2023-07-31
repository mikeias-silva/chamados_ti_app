@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">Titulo</label>
            <input type="text" name="titulo" class="form-control" readonly value="{{$chamado->titulo}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">Descrição</label>
            <textarea name="descricao" id="" cols="30" rows="10" class="form-control" readonly>{{$chamado->descricao}}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">Categoria</label>
            <select name="categoria_id" id="" class="form-select">
                <option value="{{$chamado->categoria_id}}">{{$chamado->categoria->nome}}</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">Data chamado</label>
            <input type="date" name="data_criacao" id="" class="form-control" readonly value="{{$chamado->data_criacao}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">Prazo Solução</label>
            <input type="date" name="prazo_solucao" id="" class="form-control" readonly value="{{$chamado->prazo_solucao}}">
        </div>
    </div>
@endsection
