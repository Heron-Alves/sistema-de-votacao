@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">Editar Enquete</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('enquetes.update', $enquete->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control"
                       value="{{ old('titulo', $enquete->titulo) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Início</label>
                <input type="datetime-local" name="inicio" class="form-control"
                       value="{{ \Carbon\Carbon::parse($enquete->inicio)->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Fim</label>
                <input type="datetime-local" name="fim" class="form-control"
                       value="{{ \Carbon\Carbon::parse($enquete->fim)->format('Y-m-d\TH:i') }}" required>
            </div>

            <h4>Opções</h4>
            <div id="opcoes">
                @foreach($enquete->opcoes as $opcao)
                    <input type="text" name="opcoes[]" class="form-control mb-2"
                           value="{{ $opcao->texto }}" required>
                @endforeach
            </div>

            <button type="button" class="btn btn-secondary mb-3" onclick="addOpcao()">+ Adicionar opção</button>

            <div>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <a href="{{ route('enquetes.index') }}" class="btn btn-light">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<script>
    function addOpcao() {
        const div = document.getElementById('opcoes');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'opcoes[]';
        input.classList.add('form-control', 'mb-2');
        input.placeholder = 'Outra opção';
        div.appendChild(input);
    }
</script>
@endsection
