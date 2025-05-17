<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\GaleriaIngresantes;
use App\Http\Requests\StoreGaleriaIngresantesRequest;
use App\Http\Requests\UpdateGaleriaIngresantesRequest;
use Illuminate\Http\Request;

class GaleriaIngresantesController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = GaleriaIngresantes::class;
        $this->ruta = 'GaleriaIngresantes';
    }
    public function query(Request $request){
        try{
            $search = $request->input('query', '');
            $datas = $this->model::query()
                ->where('ingresante_id', 'LIKE', "%{$search}%")
                ->orWhere('detalle', 'LIKE', "%{$search}%")
                ->orderBy('id', 'desc')
                ->get();
            return ApiResponse::success($datas, 'Consulta exitosa', 200);
        }catch (\Exception $e){
            return ApiResponse::error('Error Exception', 500, ['exception' => $e->getMessage()]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGaleriaIngresantesRequest $request)
    {
        try {
            $data = $this->model::create($request->validated());
            return ApiResponse::success($data, 'Galería de ingresantes creada exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error Exception', 500, ['exception' => $e->getMessage()]);
        }
    }

    public function upload(Request $request)
    {
        try {
            //guadar el archivo en una carpeta ingresantes
            $file = $request->file('file');
            $path = $file->store('ingresantes', 'public');
            //guardar en la base de datos
            $galeria = new GaleriaIngresantes();
            $galeria->ingresante_id = $request->input('ingresante_id');
            $galeria->detalle = $request->input('detalle');
            $galeria->photo_path = $path;
            $galeria->save();
            //retornar la respuesta
            return ApiResponse::success($galeria, 'Archivo subido exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error Exception', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(GaleriaIngresantes $galeriaIngresantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GaleriaIngresantes $galeriaIngresantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGaleriaIngresantesRequest $request, GaleriaIngresantes $galeriaIngresantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GaleriaIngresantes $galeriaIngresantes)
    {
        //
    }
}
