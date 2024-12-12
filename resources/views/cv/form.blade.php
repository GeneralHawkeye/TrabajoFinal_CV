@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Genera tu Currículum Vitae</h2>

    <form method="POST" action="{{ route('cv.generate') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="education">Educación</label>
            <textarea class="form-control" id="education" name="education" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="experience">Experiencia laboral</label>
            <textarea class="form-control" id="experience" name="experience" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="skills">Habilidades</label>
            <textarea class="form-control" id="skills" name="skills" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="languages">Idiomas</label>
            <textarea class="form-control" id="languages" name="languages" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Generar CV</button>
    </form>
</div>
@endsection
