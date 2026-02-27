<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Pessoas')</title>
  @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
  <div class="max-w-5xl mx-auto px-4 py-8">
    <div class="rounded-2xl border border-slate-800 bg-slate-900/40 shadow-xl">
      <div class="flex items-center justify-between gap-4 border-b border-slate-800 px-6 py-4">
        <h1 class="text-xl font-semibold">@yield('page_title', 'Pessoas')</h1>
        <div class="flex gap-2">@yield('header_actions')</div>
      </div>

      @if(session('ok'))
        <div class="px-6 pt-4">
          <div class="rounded-xl border border-emerald-700/40 bg-emerald-500/10 px-4 py-3 text-emerald-200">
            {{ session('ok') }}
          </div>
        </div>
      @endif

      <div class="px-6 py-6">
        @yield('content')
      </div>
    </div>
  </div>
</body>
</html>
