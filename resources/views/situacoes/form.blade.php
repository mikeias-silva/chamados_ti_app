<div class="row">
    <div class="col-3">
        <label for="nome" class="form-label">Situação atendimento</label>
        <select name="nome" id="" class="form-select">
            <option value="novo" {{ isset($situacao) && $situacao->nome == 'novo' ? 'selected' : '' }}>Novo
            </option>
            <option
                value="em atendimento" {{ isset($situacao) && $situacao->nome == 'em atendimento' ? 'selected' : '' }}>
                Em Atendimento
            </option>
            <option value="resolvido" {{ isset($situacao) && $situacao->nome == 'resolvido' ? 'selected' : '' }}>
                Resolvido
            </option>
        </select>
    </div>
</div>
<button type="submit" class="btn btn-primary mt-3">Confirmar</button>
