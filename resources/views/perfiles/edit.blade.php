@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css" integrity="sha512-sC2S9lQxuqpjeJeom8VeDu/jUJrVfJM7pJJVuH9bqrZZYqGe7VhTASUb3doXVk6WtjD0O4DTS+xBx2Zpr1vRvg==" crossorigin="anonymous" />
@endsection

@section('botones')

<a href="{{ route('recetas.index') }}"class="btn btn-primary mr-2 text-white">Volver</a>

</div>

@endsection

@section('content')
    {{-- {{$perfil}} --}}
    
    <h1 class="text-center">Editar Mi Perfil</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form 
                action=""
            >

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" 
                        name="nombre" 
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        placeholder="Tu nombre"
                        {{-- value="{{ $receta->nombre}}" --}}
                    >

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="url">Sitio web</label>
                    <input type="text" 
                        name="url" 
                        class="form-control @error('url') is-invalid @enderror"
                        id="url"
                        placeholder="Tu sitio web"
                        {{-- value="{{ $receta->url}}" --}}
                    >

                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="biografia">Biografía</label>
                    <input type="hidden" name="biografia" id="biografia">
                    <trix-editor 
                        class="form-control @error('biografia') is-invalid @enderror"
                        input="biografia"></trix-editor>
                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>               
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Tu Imagen</label>
                    <input 
                        class="form-control @error('imagen') is-invalid @enderror"
                        type="file" 
                        name="imagen" 
                        id="imagen"
                    >

                @if($perfil->imagen)
                    <div class="mt4">
                        <p>Imagen Actual:</p>
                    {{-- <img src="/storage/{{$receta->imagen}}" style="width: 300px" alt=""> --}}
                    </div>

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>               
                    @enderror
                @endif
                </div>

            </form>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.js" integrity="sha512-NbOGGQbYcLSXiUfXtAgJry0RVLJINgm0f5nYcjfc/peKfDqxSc8bIXBEKpbty7DC/IWykVLpgeEgm7ijRa1cMw==" crossorigin="anonymous" defer></script>
@endsection