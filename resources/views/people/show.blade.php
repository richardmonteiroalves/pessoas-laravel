<!doctype html>
<html lang="pt-br">
<head><meta charset="utf-8"><title>Ver pessoa</title></head>
<body>
  <h1>Pessoa #{{ $person->id }}</h1>
  <p><b>Nome:</b> {{ $person->name }}</p>
  <p><b>Email:</b> {{ $person->email }}</p>

  <p>
    <a href="{{ route('people.edit', $person) }}">Editar</a> |
    <a href="{{ route('people.index') }}">Voltar</a>
  </p>
</body>
</html>
