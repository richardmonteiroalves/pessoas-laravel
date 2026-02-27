@extends('layouts.app')

@section('title', 'Editar pessoa')
@section('page_title', 'Editar pessoa #' . $person->id)

@section('header_actions')
  <a href="{{ route('people.index') }}" class="rounded-xl border border-slate-700 px-4 py-2 hover:bg-slate-900">
    Voltar
  </a>
@endsection

@section('content')
  @if($errors->any())
    <div class="mb-4 rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-red-200">
      <ul class="list-disc pl-5">
        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('people.update', $person) }}" class="space-y-4">
    @csrf
    @method('PUT')

    <div class="grid gap-4 md:grid-cols-2">
      <div>
        <label class="mb-1 block text-sm font-semibold text-slate-300">Nome</label>
        <input name="name" value="{{ old('name', $person->name) }}"
               class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 outline-none focus:ring-4 focus:ring-blue-500/15">
      </div>

      <div>
        <label class="mb-1 block text-sm font-semibold text-slate-300">Email</label>
        <input name="email" value="{{ old('email', $person->email) }}"
               class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 outline-none focus:ring-4 focus:ring-blue-500/15">
      </div>
    </div>

    <div class="flex gap-2">
      <button class="rounded-xl bg-blue-500 px-5 py-3 font-semibold text-slate-950 hover:brightness-110" type="submit">
        Atualizar
      </button>
      <a class="rounded-xl border border-slate-700 px-5 py-3 hover:bg-slate-900" href="{{ route('people.index') }}">
        Cancelar
      </a>
    </div>
  </form>
@endsection
