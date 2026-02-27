<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Pessoas')</title>
  @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">
  <div class="max-w-5xl mx-auto px-4 py-10">
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
      <div class="flex items-center justify-between gap-4 px-6 py-4 border-b border-slate-200">
        <div>
          <h1 class="text-xl font-semibold text-slate-900">@yield('page_title', 'Pessoas')</h1>
          <p class="text-sm text-slate-500">@yield('page_subtitle', '')</p>
        </div>

        <div class="flex items-center gap-2">
          @yield('header_actions')
        </div>
      </div>

      @if(session('ok'))
        <div class="px-6 pt-4">
          <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
            {{ session('ok') }}
          </div>
        </div>
      @endif

      <div class="px-6 py-6">
        @yield('content')
      </div>
    </div>

    <p class="mt-6 text-xs text-slate-400">
      Laravel + Tailwind (Vite)
    </p>
  </div>
</body>
</html>
