<?php

namespace App\Http\Controllers;

use App\Salario;
use App\Vacante;
use App\Categoria;
use App\Ubicacion;
use App\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //$vacantes = auth()->user()->vacantes;
        //con paginate
        $vacantes = Vacante::where('User_id',auth()->user()->id)->latest()->simplePaginate(10);

        return view('vacantes.index',compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //consultar
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return view('vacantes.create',compact('categorias','experiencias','ubicaciones','salarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion
        $data = $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50',
            //'imagen' => 'required',
            'skills' => 'required'
        ]);
        
        //almacena en la base de datos
        auth()->user()->vacantes()->create([
            'titulo' => $data['titulo'],
            //'imagen' => $data['imagen'],
            'imagen' => '1234',
            'descripcion' => $data['descripcion'],
            'skills' => $data['skills'],
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario'],
        ]);
        
        return redirect()->action('VacanteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {   
        //if($vacante->activa === 0) return abort(404);
        return view('vacantes.show',compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {   
        //policy
        $this->authorize('view',$vacante);

         //consultar
         $categorias = Categoria::all();
         $experiencias = Experiencia::all();
         $ubicaciones = Ubicacion::all();
         $salarios = Salario::all();
 
        return view('vacantes.edit',compact('categorias','experiencias','ubicaciones','salarios','vacante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {   
        //policy
        $this->authorize('update',$vacante);
        //Validacion
        $data = $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50',
            //'imagen' => 'required',
            'skills' => 'required'
        ]);
        
        //new data
        $vacante->titulo = $data['titulo'];
        $vacante->skills = $data['skills'];
       // $vacante->imagen = $data['imagen'];
        $vacante->imagen = '1233';
        $vacante->descripcion = $data['descripcion'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->experiencia_id = $data['experiencia'];
        $vacante->ubicacion_id = $data['ubicacion'];
        $vacante->salario_id = $data['salario'];
        
        //save
        $vacante->save();

        //redirect
        return redirect()->action('VacanteController@index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {   
        //policy
        $this->authorize('delete',$vacante);

        
        //return response()->json($vacante);
        $vacante->delete();
        return response()->json(['respuesta' => 'se elimino']);
    }

    //agregar imagen
    public function imagen(Request $request)
    {   
        $imagen = $request->file('file');
        $nombreImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('storage/vacantes'),$nombreImagen);
        return response()->json(['correcto' => $nombreImagen]);
    }

    //borrar imagen
    public function borrarimagen(Request $request)
    {
       if($request->ajax()){
          $imagen = $request->get('imagen');

          if(File::exists('storage/vacantes/'.$imagen)){
               File::delete('storage/vacantes/'.$imagen);
          }
          return response('Imagen Eliminada',200);
       }
    }

    //cambia estado de una vacante activa o inactiva
    public function estado(Request $request, Vacante $vacante)
    {
        //leer nuevo estado, asignarlo y guardarlos
        $vacante->activa = $request->estado;
        $vacante->save();

        return response()->json(['respuesta' => 'correcto']);
    }

    public function buscar(Request $request)
    {   
        //validacion
        $data = $request->validate([
            'categoria' => 'required',
            'ubicacion' => 'required'
        ]);

        //asignar valores
        $categoria = $data['categoria'];
        $ubicacion = $data['ubicacion'];

        /*$vacantes = Vacante::where('categoria_id',$categoria)
            ->where('ubicacion_id',$ubicacion)
            ->get();*/
        
        // con or
        $vacantes = Vacante::where('categoria_id',$categoria)
            ->orwhere('ubicacion_id',$ubicacion)
            ->get();
        
        //otra
        /*$vacantes = Vacante::where([
            'categoria_id',$categoria,
            'ubicacion_id',$ubicacion            
        ])->get();*/

        return view('buscar.index',compact('vacantes'));
    }

    public function resultados()
    {
        
    }
}
