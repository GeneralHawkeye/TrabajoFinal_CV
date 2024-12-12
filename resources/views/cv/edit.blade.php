@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar CV</h1>
    <form action="{{ route('cv.update', $cv->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $cv->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $cv->email }}" required>
        </div>

        <div class="mb-3">
            <label for="education" class="form-label">Educación</label>
            <textarea class="form-control" id="education" name="education" required>{{ $cv->education }}</textarea>
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Experiencia</label>
            <textarea class="form-control" id="experience" name="experience" required>{{ $cv->experience }}</textarea>
        </div>

        <div class="mb-3">
            <label for="skills" class="form-label">Habilidades</label>
            <textarea class="form-control" id="skills" name="skills" required>{{ $cv->skills }}</textarea>
        </div>

        <div class="mb-3">
            <label for="languages" class="form-label">Idiomas</label>
            <textarea class="form-control" id="languages" name="languages" required>{{ $cv->languages }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('cv.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
