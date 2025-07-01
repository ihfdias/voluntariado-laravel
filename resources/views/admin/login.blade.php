@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Login Administrativo</h2>

    @if (session('erro'))
        <div class="alert alert-danger">{{ session('erro') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success" type="submit">Entrar</button>
    </form>
</div>
@endsection
