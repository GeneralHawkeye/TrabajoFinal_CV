@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis CVs</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Educación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cvs as $cv)
                <tr>
                    <td>{{ $cv->name }}</td>
                    <td>{{ $cv->email }}</td>
                    <td>{{ $cv->education }}</td>
                    <td>
                        <a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('cv.download', $cv->id) }}" class="btn btn-success btn-sm">Descargar</a>
                        <form action="{{ route('cv.destroy', $cv->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No has creado ningún CV aún.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
