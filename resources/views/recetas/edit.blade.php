@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css" integrity="sha512-sC2S9lQxuqpjeJeom8VeDu/jUJrVfJM7pJJVuH9bqrZZYqGe7VhTASUb3doXVk6WtjD0O4DTS+xBx2Zpr1vRvg==" crossorigin="anonymous" />
@endsection

@section('botones')

<a href="{{ route('recetas.index') }}"class="btn btn-primary mr-2 text-white">Volver</a>

</div>

@endsection

@section('content')

<h2 class="text-center mb-5">Editar Receta: {{$receta->titulo}}</h2>

    {{ $receta }}

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
        <form method="post" action="{{route('recetas.store')}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input type="text" 
                        name="titulo" 
                        class="form-control @error('titulo') is-invalid @enderror"
                        id="titulo"
                        placeholder="Titulo Receta"
                        value="{{ $receta->titulo}}"
                    >

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categorias">Categorías</label>

                    <select 
                        name="categoria" 
                        class="form-control @error('categoria') is-invalid @enderror"
                        id="categoria"
                    >
                        
                        <option value="">-- Seleccione --</option>
                        @foreach($categorias as $categoria)
                            <option 
                                value="{{ $categoria->id }}" 
                                {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}
                                >{{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>               
                    @enderror

                </div>

                <div class="form-group mt-3">
                    <label for="preparacion">Preparación</label>
                    <input type="hidden" name="preparacion" id="preparacion" value="{{ $receta->preparacion }}">
                    <trix-editor 
                        class="form-control @error('preparacion') is-invalid @enderror"
                        input="preparacion"></trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>               
                    @enderror
                </div>
                
                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" name="ingredientes" id="ingredientes" value="{{ $receta->ingredientes }}">
                    <trix-editor
                        class="form-control @error('ingredientes') is-invalid @enderror" 
                        input="ingredientes"></trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>               
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Elige la imagen</label>
                    <input 
                        class="form-control @error('imagen') is-invalid @enderror"
                        type="file" 
                        name="imagen" 
                        id="imagen"
                    >

                    <div class="mt4">
                        <p>Imagen Actual:</p>
                    <img src="/storage/{{$receta->imagen}}" style="width: 300px" alt="">
                    </div>

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>               
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta">
                </div>

            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.js" integrity="sha512-NbOGGQbYcLSXiUfXtAgJry0RVLJINgm0f5nYcjfc/peKfDqxSc8bIXBEKpbty7DC/IWykVLpgeEgm7ijRa1cMw==" crossorigin="anonymous" defer></script>
@endsection