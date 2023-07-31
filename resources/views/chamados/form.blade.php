<div class="row">
    <div class="col-12 mb-3">
        <label for="" class="form-label">Titulo</label>
        <input type="text" name="titulo" class="form-control" value="{{old('titulo') ?? $chamado->titulo ?? ''}}">
    </div>
</div>
<div class="row">
    <div class="col-12 mb-3">
        <label for="" class="form-label">Descrição</label>
        <textarea name="descricao" id="" cols="30" rows="10" class="form-control">{{$chamado->descricao ?? ''}}</textarea>
    </div>
</div>


<div class="row">
    <div class="col-12 mb-3">
        <label for="" class="form-label">Categoria</label>
        <select name="categoria_id" id="" class="form-select">
            @foreach($categorias as $item)
                <option value="{{$item->id}}" {{ isset($chamado) && $item->id === $chamado->categoria_id ? 'selected' : '' }}>{{$item->nome}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <label for="" class="form-label">Data chamado</label>
        <input type="date" name="data_criacao" id="" class="form-control" value="{{$chamado->data_criacao}}">
    </div>
</div>
