@extends('layouts.movies')

@section('title', 'Agregar película')

@section('content')
    <div class="mx-auto max-w-2xl space-y-8">
        <div>
            <a href="{{ route('movies.index') }}" class="text-sm font-semibold text-blue-400 transition hover:text-blue-300">
                &larr; Volver al catálogo
            </a>
            <p class="mt-6 text-sm font-semibold uppercase tracking-widest text-blue-400">Nueva película</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-white">Agregar película</h1>
            <p class="mt-2 text-slate-400">Completá los datos para sumar un título a tu colección.</p>
        </div>

        @if ($errors->any())
            <div class="rounded-xl border border-red-400/20 bg-red-400/10 px-4 py-3 text-sm text-red-300" role="alert">
                <p class="font-semibold">Revisá los datos ingresados:</p>
                <ul class="mt-2 list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movies.store') }}" method="POST" class="space-y-6 rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-lg shadow-slate-950/20 sm:p-8">
            @csrf

            <div>
                <label for="title" class="block text-sm font-semibold text-slate-200">Título</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required autofocus class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm placeholder:text-slate-500 focus:border-blue-400 focus:ring-blue-400" placeholder="Ej. Inception">
            </div>

            <div>
                <label for="director" class="block text-sm font-semibold text-slate-200">Director</label>
                <input type="text" id="director" name="director" value="{{ old('director') }}" required class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm placeholder:text-slate-500 focus:border-blue-400 focus:ring-blue-400" placeholder="Ej. Christopher Nolan">
            </div>

            <div>
                <label for="year" class="block text-sm font-semibold text-slate-200">Año</label>
                <input type="number" id="year" name="year" value="{{ old('year') }}" min="1888" max="{{ now()->year }}" required class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm placeholder:text-slate-500 focus:border-blue-400 focus:ring-blue-400" placeholder="{{ now()->year }}">
            </div>

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('movies.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-700 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-800">
                    Cancelar
                </a>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-blue-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-slate-950">
                    Guardar película
                </button>
            </div>
        </form>
    </div>
@endsection
