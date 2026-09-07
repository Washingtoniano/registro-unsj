@extends('layouts.app')

@php
    $peliculas = session('peliculas', []);
@endphp

@section('content')
    <div class="space-y-8">
        <div class="flex flex-col gap-4 border-b border-gray-200 pb-6 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Catálogo</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-950 sm:text-4xl">Películas</h1>
                <p class="mt-2 max-w-2xl text-gray-600">Explorá tu colección de películas favoritas.</p>
            </div>
            <span class="inline-flex w-fit items-center rounded-full bg-indigo-50 px-3 py-1 text-sm font-semibold text-indigo-700">
                {{ count($peliculas) }} {{ count($peliculas) === 1 ? 'título' : 'títulos' }}
            </span>
        </div>

        @if (count($peliculas) > 0)
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($peliculas as $pelicula)
                    <article class="group flex min-h-52 flex-col justify-between rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-indigo-200 hover:shadow-lg">
                        <div>
                            <div class="flex items-start justify-between gap-4">
                                <h2 class="text-xl font-bold leading-tight text-gray-950">{{ $pelicula['nombre'] }}</h2>
                                <span class="shrink-0 rounded-lg bg-gray-100 px-2.5 py-1 text-sm font-medium text-gray-600">
                                    {{ $pelicula['year'] }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-8 flex items-center gap-2 text-sm text-gray-500">
                            <span class="h-2 w-2 rounded-full bg-indigo-500"></span>
                            <span>{{ $pelicula['genero'] }}</span>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border border-dashed border-gray-300 bg-white px-6 py-16 text-center shadow-sm">
                <h2 class="text-lg font-semibold text-gray-900">Todavía no hay películas</h2>
                <p class="mt-2 text-gray-500">Cuando agregues títulos, aparecerán en este catálogo.</p>
            </div>
        @endif
    </div>
@endsection