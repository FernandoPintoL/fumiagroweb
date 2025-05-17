<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\TipoPropiedades;
use App\Http\Requests\StoreTipoPropiedadesRequest;
use App\Http\Requests\UpdateTipoPropiedadesRequest;
use Illuminate\Http\Request;

class TipoPropiedadesController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = TipoPropiedades::class;
        $this->ruta = 'TipoPropiedades';
    }
    public function query(Request $request){
        try{
            $search = $request->input('query', '');
            $datas = $this->model::query()
                ->where('sigla', 'LIKE', "%{$search}%")
                ->orWhere('detalle', 'LIKE', "%{$search}%")
                ->orderBy('id', 'desc')->get();
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
    public function store(StoreTipoPropiedadesRequest $request)
    {
        try {
            $data = $this->model::create($request->validated());
            return ApiResponse::success($data, 'Tipo de propiedad creado exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoPropiedades $tipoPropiedades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoPropiedades $tipoPropiedades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoPropiedadesRequest $request, TipoPropiedades $tipoPropiedades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoPropiedades $tipoPropiedades)
    {
        //
    }
}
