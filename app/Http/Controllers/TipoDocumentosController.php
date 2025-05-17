<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\TipoDocumentos;
use App\Http\Requests\StoreTipoDocumentosRequest;
use App\Http\Requests\UpdateTipoDocumentosRequest;
use Illuminate\Http\Request;

class TipoDocumentosController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = TipoDocumentos::class;
        $this->ruta = 'TipoDocumentos';
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
    public function store(StoreTipoDocumentosRequest $request)
    {
        try {
            $data = $this->model::create($request->validated());
            return ApiResponse::success($data, 'Tipo de documento creado exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al crear el tipo de documento', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoDocumentos $tipoDocumentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoDocumentos $tipoDocumentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoDocumentosRequest $request, TipoDocumentos $tipoDocumentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoDocumentos $tipoDocumentos)
    {
        //
    }
}
