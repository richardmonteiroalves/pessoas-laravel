@extends('layouts.app')

@section('title', 'Pessoas')
@section('page_title', 'Pessoas')
@section('page_subtitle', 'CRUD Web (tema claro)')

@section('header_actions')
  <a href="{{ route('people.create') }}"
     class="inline-flex items-center rounded-xl bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700">
    + Nova pessoa
  </a>
@endsection

@section('content')
  <div class="overflow-auto rounded-xl border border-slate-200">
    <table class="min-w-full text-sm">
      <thead class="bg-slate-100">
        <tr class="text-left text-slate-600">
          <th class="px-4 py-3 w-20">ID</th>
          <th class="px-4 py-3">Nome</th>
          <th class="px-4 py-3">Email</th>
          <th class="px-4 py-3 text-right w-56">Ações</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-slate-200 bg-white">
        @forelse($people as $p)
          <tr class="hover:bg-slate-50">
            <td class="px-4 py-3">{{ $p->id }}</td>
            <td class="px-4 py-3 font-medium text-slate-900">{{ $p->name }}</td>
            <td class="px-4 py-3 text-slate-700">{{ $p->email }}</td>
            <td class="px-4 py-3 text-right space-x-2">
              <a class="text-blue-700 font-semibold hover:underline"
                 href="{{ route('people.edit', $p) }}">Editar</a>

              <form class="inline" method="POST" action="{{ route('people.destroy', $p) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="rounded-lg border border-red-200 px-3 py-1 text-red-700 hover:bg-red-50"
                        onclick="return confirm('Excluir esta pessoa?')">
                  Excluir
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td class="px-4 py-8 text-slate-500" colspan="4">Sem registros.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
