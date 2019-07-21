@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Atualizar Categoria</div>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        <div class="card-body">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <label for="">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $category->name }}">
                    @error('name')
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
            <a href="{{ route('categories.index') }}" class="btn btn-default">
                Voltar
            </a>
        </div>
    </form>
</div>

@endsection