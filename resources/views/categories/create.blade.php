@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Cadastrar Categoria</div>
    <form action="{{ route('categories.store') }}" method="POST">
        <div class="card-body">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
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
                Salvar
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-default">
                Voltar
            </a>
        </div>
    </form>
</div>

@endsection