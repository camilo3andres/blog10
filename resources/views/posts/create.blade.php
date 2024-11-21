@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear una Nueva Publicación</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titulo </label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">descripcion corta</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">caloca una imagen de tu post</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
    </div>
@endsection
