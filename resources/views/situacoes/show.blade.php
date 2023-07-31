@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            Situação
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <label for="" class="form-label">Nome</label>
                    <input type="text" value="{{$situacao->presenter()->nome($situacao->nome)}}" readonly/>
                </div>
            </div>
        </div>
    </div>
@endsection
