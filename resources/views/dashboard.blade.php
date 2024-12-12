@extends('layouts.app') <!-- Asegúrate de extender el layout principal -->

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Acceso a las funcionalidades del CV -->
            <div class="mt-4">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">Gestión de CVs</h3>
                <div class="flex flex-col sm:flex-row gap-4 mt-4">
                    <!-- Botón para generar un nuevo CV -->
                    <a href="{{ route('cv.form') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        Generar CV
                    </a>

                    <!-- Botón para ver los CVs creados -->
                    <a href="{{ route('cv.index') }}" class="btn btn-secondary bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
                        Ver mis CVs
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
