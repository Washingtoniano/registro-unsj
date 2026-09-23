@extends('layouts.movies')

@section('title', 'Películas')

@section('content')
    <div class="space-y-8">
        <div class="flex flex-col gap-4 border-b border-slate-800 pb-6 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-widest text-blue-400">Catálogo</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Películas</h1>
                <p class="mt-2 max-w-2xl text-slate-400">Explorá tu colección de películas favoritas.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <span class="inline-flex w-fit items-center rounded-full bg-blue-500/10 px-3 py-1 text-sm font-semibold text-blue-300 ring-1 ring-inset ring-blue-400/20">
                    {{ count($movies) }} {{ count($movies) === 1 ? 'título' : 'títulos' }}
                </span>
                <a href="{{ route('movies.create') }}" class="inline-flex items-center rounded-lg bg-blue-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-slate-950">
                    + Agregar película
                </a>
            </div>
        </div>

        @if (count($movies) > 0)
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($movies as $movie)
                    <article class="group flex min-h-52 flex-col justify-between rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-lg shadow-slate-950/20 transition hover:-translate-y-1 hover:border-blue-400/50 hover:shadow-blue-950/30">
                        <div>
                            <div class="flex items-start justify-between gap-4">
                                <h2 class="text-xl font-bold leading-tight text-white">{{ $movie['title'] }}</h2>
                                <span class="shrink-0 rounded-lg bg-slate-800 px-2.5 py-1 text-sm font-medium text-slate-300">
                                    {{ $movie['year'] }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-8 flex items-center gap-2 text-sm text-slate-400">
                            <span class="h-2 w-2 rounded-full bg-blue-400"></span>
                            <span>{{ $movie['director'] }}</span>
                        </div>
                        <div class="mt-6 flex items-center gap-3 border-t border-slate-800 pt-4">
                            <a href="{{ route('movies.edit', $movie['id']) }}" class="inline-flex items-center rounded-lg border border-blue-400/50 px-3 py-2 text-sm font-semibold text-blue-300 transition hover:bg-blue-400/10">
                                Editar
                            </a>
                            <form action="{{ route('movies.destroy', $movie['id']) }}" method="POST" onsubmit="return confirm('¿Eliminar esta película?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center rounded-lg border border-red-400/50 px-3 py-2 text-sm font-semibold text-red-300 transition hover:bg-red-400/10">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border border-dashed border-slate-700 bg-slate-900 px-6 py-16 text-center shadow-lg shadow-slate-950/20">
                <h2 class="text-lg font-semibold text-white">Todavía no hay películas</h2>
                <p class="mt-2 text-slate-400">Cuando agregues títulos, aparecerán en este catálogo.</p>
            </div>
        @endif
    </div>
@endsection