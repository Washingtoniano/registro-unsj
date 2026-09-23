<!DOCTYPE html>
<html lang="es" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="color-scheme" content="dark">

        <title>@yield('title', 'Movies Manager') · {{ config('app.name', 'MovieApp') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')
    </head>
    <body class="min-h-screen bg-slate-950 font-sans text-slate-100 antialiased">
        <div class="flex min-h-screen flex-col">
            <header class="border-b border-slate-800/80 bg-slate-950/95">
                <div class="mx-auto flex w-full max-w-7xl items-center justify-between gap-6 px-4 py-6 sm:px-6 lg:px-8">
                    <a href="{{ route('movies.index') }}" class="group flex items-center gap-3" aria-label="Ir al catálogo de películas">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400 ring-1 ring-inset ring-blue-400/20 transition group-hover:bg-blue-500/20">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m7 4 3 4m4-4-3 4m-4 8 3 4m4-4-3 4m-6-4h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 10.5h.01M8 13.5h.01" />
                            </svg>
                        </span>
                        <span>
                            <span class="block text-lg font-bold tracking-tight text-white">Movies Manager</span>
                            <span class="block text-sm text-slate-400">Tu colección, organizada</span>
                        </span>
                    </a>

                    <div class="flex items-center gap-3">
                        @yield('header-actions')
                    </div>
                </div>
            </header>

            <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-8 sm:px-6 lg:px-8 lg:py-10">
                @if (session('status'))
                    <div class="mb-6 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm font-medium text-emerald-300" role="status">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </main>

            <footer class="border-t border-slate-800/80 bg-slate-950">
                <div class="mx-auto flex w-full max-w-7xl flex-col gap-2 px-4 py-6 text-sm text-slate-400 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <p>&copy; {{ now()->year }} Movies Manager</p>
                    <p>Tu colección, siempre organizada <span aria-hidden="true">🎬</span></p>
                </div>
            </footer>
        </div>

        @stack('scripts')
    </body>
</html>
