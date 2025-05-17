<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\VehiculosIngresantes;
use App\Http\Requests\StoreVehiculosIngresantesRequest;
use App\Http\Requests\UpdateVehiculosIngresantesRequest;
use Illuminate\Http\Request;

class VehiculosIngresantesController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = VehiculosIngresantes::class;
        $this->ruta = 'VehiculosIngresantes';

    }
    public function query(Request $request)
    {
        try {
            $search = $request->input('query', '');
            $datas = $this->model::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('detalle', 'LIKE', "%{$search}%")
                ->orderBy('id', 'desc')
                ->get();
            return ApiResponse::success($datas, 'Consulta exitosa', 200);
        } catch (\Exception $e) {
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
    public function store(StoreVehiculosIngresantesRequest $request)
    {
        try {
            $data = $this->model::create($request->validated());
            return ApiResponse::success($data, 'Vehiculo Ingresante creado exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error Exception', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VehiculosIngresantes $vehiculosIngresantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehiculosIngresantes $vehiculosIngresantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehiculosIngresantesRequest $request, VehiculosIngresantes $vehiculosIngresantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehiculosIngresantes $vehiculosIngresantes)
    {
        //
    }
}
