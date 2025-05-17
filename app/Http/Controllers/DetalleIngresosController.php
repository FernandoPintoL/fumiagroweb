<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\DetalleIngresos;
use App\Http\Requests\StoreDetalleIngresosRequest;
use App\Http\Requests\UpdateDetalleIngresosRequest;

class DetalleIngresosController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = DetalleIngresos::class;
        $this->ruta = 'DetalleIngresos';
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
    public function store(StoreDetalleIngresosRequest $request)
    {
        try {
            $data = $this->model::create($request->validated());
            return ApiResponse::success($data, 'Detalle de ingreso creado exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error Exception', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleIngresos $detalleIngresos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleIngresos $detalleIngresos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetalleIngresosRequest $request, DetalleIngresos $detalleIngresos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleIngresos $detalleIngresos)
    {
        //
    }
}
