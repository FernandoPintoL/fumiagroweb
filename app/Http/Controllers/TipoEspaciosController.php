<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\TipoEspacios;
use App\Http\Requests\StoreTipoEspaciosRequest;
use App\Http\Requests\UpdateTipoEspaciosRequest;
use Illuminate\Http\Request;

class TipoEspaciosController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = TipoEspacios::class;
        $this->ruta = 'TipoEspacios';
    }
    public function query(Request $request){
        try{
            $search = $request->input('query', '');
            $datas = $this->model::query()
                ->where('sigla', 'LIKE', "%{$search}%")
                ->orWhere('detalle', 'LIKE', "%{$search}%")
                ->orderBy('id', 'desc')
                ->get();
            return ApiResponse::success($datas, 'Consulta exitosa', 200);
        }catch (\Exception $e){
            return ApiResponse::error($e->getMessage());
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
    public function store(StoreTipoEspaciosRequest $request)
    {
        try {
            $data = $this->model::create($request->validated());
            return ApiResponse::success($data, 'Tipo de espacio creado exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al crear el tipo de espacio', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoEspacios $tipoEspacios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoEspacios $tipoEspacios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoEspaciosRequest $request, TipoEspacios $tipoEspacios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoEspacios $tipoEspacios)
    {
        //
    }
}
