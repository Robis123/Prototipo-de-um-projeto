@extends('layout')
@section('cabecalho')
Animes
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-sucess">
{{$mensagem}}
</div>
@endif
    


<a href="{{route('criar_anime')}}" class="btn btn-dark mt-5 mb-2">Adicionar</a>
<ul class='list-group'>
    @foreach ($animes as $anime)
        <li class='list-group-item d-flex justify-content-between align-items-center'>

            <span id="nome-anime-{{ $anime->id }}">{{ $anime->nome }}</span>

            <div class="input-group w-50" hidden id="input-nome-anime-{{ $anime->id }}">
                <input type="text" class="form-control" value="{{$anime->nome}}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarAnime({{ $anime->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>
        <span class="d-flex">
            <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $anime->id }})">
                <i class="fas fa-edit"></i>
            </button>
            <a href="/animes/{{$anime->id}}/temporadas" class="btn btn-info" style="margin-left: 10px">Informações</a>
            <form action="/animes/{{$anime->id}}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover {{addslashes($anime->nome)}}?')">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger" style="margin-left: 10px">Excluir</button>
            </form>
        </span>
        </li>
    @endforeach
</ul>
<script>
function toggleInput(animeId) {
    const nomeAnimeEl = document.getElementById(`nome-anime-${animeId}`);
    const inputAnimeEl = document.getElementById(`input-nome-anime-${animeId}`);
    if (nomeAnimeEl.hasAttribute('hidden')) {
        nomeAnimeEl.removeAttribute('hidden');
        inputAnimeEl.hidden = true;
    } else {
        inputAnimeEl.removeAttribute('hidden');
        nomeAnimeEl.hidden = true;
    }
}
function editarAnime(animeId) {
    let formData = new FormData();
    const nome = document
        .querySelector(`#input-nome-anime-${animeId} > input`)
        .value;;
    const token = document.querySelector(`input[name='_token']`).value;

    formData.append('nome', nome);
    formData.append('_token', token);
    const url = `animes/${animeId}/editaNome`;
        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(() => {
            toggleInput(animeId);
            document.getElementById(`nome-anime-${animeId}`).textContent = nome;
        })
}
</script>
@endsection



    

