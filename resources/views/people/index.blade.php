@extends('layouts.app')

@section('title', 'Pessoas')
@section('page_title', 'Pessoas')

@section('header_actions')
  <a href="{{ route('people.create') }}"
     class="inline-flex items-center rounded-xl bg-blue-500 px-4 py-2 font-semibold text-slate-950 hover:brightness-110">
    + Nova pessoa
  </a>
@endsection

@section('content')
  <div class="overflow-auto rounded-xl border border-slate-800">
    <table class="min-w-full text-sm">
      <thead class="bg-slate-900">
        <tr class="text-left text-slate-300">
          <th class="px-4 py-3">ID</th>
          <th class="px-4 py-3">Nome</th>
          <th class="px-4 py-3">Email</th>
          <th class="px-4 py-3 text-right">Ações</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-slate-800">
        @forelse($people as $p)
          <tr class="hover:bg-slate-900/50">
            <td class="px-4 py-3">{{ $p->id }}</td>
            <td class="px-4 py-3">{{ $p->name }}</td>
            <td class="px-4 py-3">{{ $p->email }}</td>
            <td class="px-4 py-3 text-right space-x-2">
              <a class="text-blue-400 hover:underline" href="{{ route('people.edit', $p) }}">Editar</a>

              <form class="inline" method="POST" action="{{ route('people.destroy', $p) }}">
                @csrf
                @method('DELETE')
                <button class="rounded-lg border border-red-400/50 px-3 py-1 text-red-200 hover:bg-red-500/10"
                        onclick="return confirm('Excluir esta pessoa?')" type="submit">
                  Excluir
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td class="px-4 py-6 text-slate-400" colspan="4">Sem registros.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
