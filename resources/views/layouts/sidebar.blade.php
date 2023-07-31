<!-- Sidebar -->
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('indicadores.index')}}">
                    <i class="bi bi-house-door"></i> Indicadores
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('chamados.index')}}">
                    <i class="bi bi-person"></i> Chamados
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('situacoes.index')}}">
                    <i class="bi bi-gear"></i> Situaçõoes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categorias.index')}}">
                    <i class="bi bi-envelope"></i> Categorias
                </a>
            </li>
        </ul>
    </div>
</nav>
