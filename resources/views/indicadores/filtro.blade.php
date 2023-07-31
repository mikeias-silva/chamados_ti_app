@extends('layouts.master')
@section('content')
    <form action="{{route('indicadores.filtrar')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-4">
                <label for="" class="form-label">Mês abertura chamado</label>
                <input type="date" name="data_chamado" id="" class="form-control mt-3 mb-3">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
@endsection
