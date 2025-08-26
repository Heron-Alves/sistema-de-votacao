@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Enquetes</h1>

    <a href="{{ route('enquetes.create') }}" class="btn btn-primary mb-3">+ Nova Enquete</a>

    @foreach($enquetes as $enquete)
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">{{ $enquete->titulo }}</h2>
                <p>De: {{ $enquete->inicio }} até {{ $enquete->fim }}</p>
                <p><strong>Status:</strong> {{ $enquete->status }}</p>

                <ul class="list-group mb-3">
                    @foreach($enquete->opcoes as $opcao)
                        <li id="opcao-{{ $opcao->id }}" class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                {{ $opcao->texto }}
                                (<span class="votos">{{ $opcao->votos }}</span> votos)
                            </span>

                            <form class="votar-form" method="POST" action="{{ route('votar', $opcao->id) }}">
                                @csrf
                                <button type="submit"
                                    {{ $enquete->status !== 'Em andamento' ? 'disabled' : '' }}
                                    class="btn btn-sm btn-success">
                                    Votar
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ route('enquetes.edit', $enquete->id) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('enquetes.destroy', $enquete->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach

    <script>
        document.querySelectorAll('.votar-form').forEach(form => {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                const action = this.getAttribute('action');
                const formData = new FormData(this);

                try {
                    const response = await fetch(action, {
                        method: 'POST',
                        body: formData,
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });

                    if (!response.ok) {
                        console.error("Erro ao votar:", response.statusText);
                        return;
                    }

                    const data = await response.json();

                    const li = document.getElementById('opcao-' + data.id);
                    li.querySelector('.votos').textContent = data.votos;

                } catch (error) {
                    console.error("Erro de conexão:", error);
                }
            });
        });
    </script>
@endsection
