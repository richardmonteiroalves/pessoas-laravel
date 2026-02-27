@extends('layouts.app')

@section('title', 'Editar pessoa')
@section('page_title', 'Editar pessoa #' . $person->id)

@section('header_actions')
  <a href="{{ route('people.index') }}"
     class="rounded-xl border border-slate-200 px-4 py-2 text-slate-700 hover:bg-slate-100">
    Voltar
  </a>
@endsection

@section('content')
  @if($errors->any())
    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-800">
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
        <label class="block text-sm font-semibold text-slate-700 mb-1">Nome</label>
        <input name="name" value="{{ old('name', $person->name) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-400">
      </div>

      <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
        <input name="email" value="{{ old('email', $person->email) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-400">
      </div>
    </div>

    <div class="flex gap-2">
      <button type="submit"
              class="rounded-xl bg-blue-600 px-5 py-3 text-white font-semibold hover:bg-blue-700">
        Atualizar
      </button>
      <a href="{{ route('people.index') }}"
         class="rounded-xl border border-slate-200 px-5 py-3 text-slate-700 hover:bg-slate-100">
        Cancelar
      </a>
    </div>
  </form>
@endsection
