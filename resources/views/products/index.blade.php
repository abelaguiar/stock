@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Lista de Produtos
        <span class="float-right">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">
                Cadastrar
            </a>
        </span>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead class="thead-dark text-center">
                <tr class="text-center">
                    <th>#</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($products as $key => $product)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->value }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"0>
                                    Editar
                                </a>
                                <button class="btn btn-sm btn-danger"
                                        onclick="event.preventDefault(); document.getElementById('delete-{{ $product->id }}-form').submit();">
                                    Excluir
                                </button>
                            </div>
                        </td>
                    </tr>
                    <form id="delete-{{ $product->id }}-form" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
        {{ $products->render() }}
    </div>
</div>

@endsection