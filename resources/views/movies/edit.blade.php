@extends('layouts.movies')

@section('title', 'Editar película')

@section('content')
	<div class="mx-auto max-w-2xl space-y-8">
		<div>
			<a href="{{ route('movies.index') }}" class="text-sm font-semibold text-blue-400 transition hover:text-blue-300">
				&larr; Volver al catálogo
			</a>
			<p class="mt-6 text-sm font-semibold uppercase tracking-widest text-blue-400">Editar película</p>
			<h1 class="mt-2 text-3xl font-bold tracking-tight text-white">{{ $movie['title'] }}</h1>
		</div>

		<form action="{{ route('movies.update', $movie['id']) }}" method="POST" class="space-y-6 rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-lg shadow-slate-950/20 sm:p-8">
			@csrf
			@method('PUT')

			<div>
				<label for="title" class="block text-sm font-semibold text-slate-200">Título</label>
				<input
					type="text"
					id="title"
					name="title"
					value="{{ old('title', $movie['title']) }}"
					class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm placeholder:text-slate-500 focus:border-blue-400 focus:ring-blue-400"
				>
			</div>

			<div>
				<label for="director" class="block text-sm font-semibold text-slate-200">Director</label>
				<input type="text" id="director" name="director" value="{{ old('director', $movie['director']) }}" class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm focus:border-blue-400 focus:ring-blue-400">
			</div>

			<div>
				<label for="year" class="block text-sm font-semibold text-slate-200">Año</label>
				<input type="number" id="year" name="year" min="1888" max="{{ now()->year }}" value="{{ old('year', $movie['year']) }}" class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm focus:border-blue-400 focus:ring-blue-400">
			</div>

			<div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
				<a href="{{ route('movies.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-700 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-800">
					Cancelar
				</a>
				<button type="submit" class="inline-flex items-center justify-center rounded-lg bg-blue-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-slate-950">
					Guardar
				</button>
			</div>
		</form>
	</div>
@endsection
