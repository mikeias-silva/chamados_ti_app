@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            Categoria
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <label for="" class="form-label">Nome</label>
                    <input type="text" value="{{$categoria->nome}}" readonly/>
                </div>
            </div>
        </div>
    </div>
@endsection
