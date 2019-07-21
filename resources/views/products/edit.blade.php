@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Atualizar Produto</div>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        <div class="card-body">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-7">
                    <label for="">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $product->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="">Valor</label>
                    <input type="text" name="value" class="form-control" value="{{ old('value') ?? $product->value }}">
                    @error('value')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="">Categoria</label>
                    <select name="category_id" class="form-control">
                        <option value="">Selecionar</option>
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}" {{ old('category_id') == $id || $product->category_id == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                Atualizar
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-default">
                Voltar
            </a>
        </div>
    </form>
</div>

@endsection