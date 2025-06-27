<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Agendamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white p-4">

    <div class="container">
        <h1 class="mb-4">Agendamentos</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif


        <a href="{{ route('agendamentos.create') }}" class="btn btn-success mb-3">+ Novo Agendamento</a>

        <table class="table table-bordered table-dark table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agendamentos as $ag)
                <tr>
                    <td>{{ $ag->nome }}</td>
                    <td>{{ $ag->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($ag->data)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($ag->hora)->format('H:i') }}</td>
                    <td>
                        <a href="{{ route('agendamentos.edit', $ag->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('agendamentos.destroy', $ag->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Nenhum agendamento encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>