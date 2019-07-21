@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Lista de Categorias
        <span class="float-right">
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">
                Cadastrar
            </a>
        </span>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead class="thead-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($categories as $key => $category)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary"0>
                                    Editar
                                </a>
                                <button class="btn btn-sm btn-danger"
                                        onclick="event.preventDefault(); document.getElementById('delete-{{ $category->id }}-form').submit();">
                                    Excluir
                                </button>
                            </div>
                        </td>
                    </tr>
                    <form id="delete-{{ $category->id }}-form" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
        {{ $categories->render() }}
    </div>
</div>

@endsection