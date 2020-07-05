<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //auth()->user()->recetas->dd();
        $recetas = auth()->user()->recetas;

        return view('recetas.index')->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //DB::table('categoria_receta')->get()->pluck('nombre', 'id')->dd();

        //Obtener categoria sin modelo
        // $categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id');

        //obtener categoria con modelo
        $categorias = CategoriaReceta::all('id', 'nombre');

        return view('recetas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validacion
        $data = request()->validate([
            'titulo'        => 'required|min:6',
            'categoria'     => 'required',
            'preparacion'   => 'required',
            'ingredientes'  => 'required',
            'imagen'        => 'required|image',
        ]);

        //obtener ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        // dd(public_path("storage/{$ruta_imagen}"));

        //resize de la imagen
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1200, 550);
        $img->save();

        //almacenar en la BD (sin modelo)
        // DB::table('recetas')->insert([
        //     'titulo'        => $data['titulo'],
        //     'preparacion'   => $data['preparacion'],
        //     'ingredientes'  => $data['ingredientes'],
        //     'imagen'        => $ruta_imagen,
        //     'user_id'       => Auth::user()->id,
        //     'categoria_id'  => $data['categoria'],
        // ]);

        //almacenar en la BD con modelo
        auth()->user()->recetas()->create([
            'titulo'        => $data['titulo'],
            'preparacion'   => $data['preparacion'],
            'ingredientes'  => $data['ingredientes'],
            'imagen'        => $ruta_imagen,
            'categoria_id'  => $data['categoria'],
        ]);


        //Redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
