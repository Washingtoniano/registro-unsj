@extends('layouts.app')

@section('content')
	<div class="mx-auto max-w-2xl space-y-8">
		<div>
			<a href="{{ route('movies.index') }}" class="text-sm font-semibold text-indigo-600 transition hover:text-indigo-800">
				&larr; Volver al catálogo
			</a>
			<p class="mt-6 text-sm font-semibold uppercase tracking-widest text-indigo-600">Editar película</p>
			<h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-950">{{ $pelicula['nombre'] }}</h1>
		</div>

		<form action="{{ route('movies.update', $pelicula['id']) }}" method="POST" class="space-y-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
			@csrf
			@method('PUT')

			<div>
				<label for="nombre" class="block text-sm font-semibold text-gray-700">Título</label>
				<input
					type="text"
					id="nombre"
					name="nombre"
					value="{{ $pelicula['nombre'] }}"
					class="mt-2 block w-full rounded-lg border-gray-300 px-4 py-3 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
				>
			</div>

			<div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
				<a href="{{ route('movies.index') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
					Cancelar
				</a>
				<button type="submit" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
					Guardar
				</button>
			</div>
		</form>
	</div>
@endsection
