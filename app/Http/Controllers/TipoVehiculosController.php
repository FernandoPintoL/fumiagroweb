<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\TipoVehiculos;
use App\Http\Requests\StoreTipoVehiculosRequest;
use App\Http\Requests\UpdateTipoVehiculosRequest;
use Illuminate\Http\Request;

class TipoVehiculosController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = TipoVehiculos::class;
        $this->ruta = 'TipoVehiculos';
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
    public function store(StoreTipoVehiculosRequest $request)
    {
        try {
            $data = $this->model::create($request->validated());
            return ApiResponse::success($data, 'Tipo de vehículo creado exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoVehiculos $tipoVehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoVehiculos $tipoVehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoVehiculosRequest $request, TipoVehiculos $tipoVehiculos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoVehiculos $tipoVehiculos)
    {
        //
    }
}
