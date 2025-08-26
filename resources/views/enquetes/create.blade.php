@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">Criar Nova Enquete</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('enquetes.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Início</label>
                <input type="datetime-local" name="inicio" class="form-control" value="{{ old('inicio') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Fim</label>
                <input type="datetime-local" name="fim" class="form-control" value="{{ old('fim') }}" required>
            </div>

            <h4>Opções (mínimo 3)</h4>
            <div id="opcoes">
                <input type="text" name="opcoes[]" class="form-control mb-2" placeholder="Opção 1" required>
                <input type="text" name="opcoes[]" class="form-control mb-2" placeholder="Opção 2" required>
                <input type="text" name="opcoes[]" class="form-control mb-2" placeholder="Opção 3" required>
            </div>

            <button type="button" class="btn btn-secondary mb-3" onclick="addOpcao()">+ Adicionar opção</button>

            <div>
                <button type="submit" class="btn btn-primary">Salvar</button>
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
