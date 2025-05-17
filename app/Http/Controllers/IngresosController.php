<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Ingresos;
use App\Http\Requests\StoreIngresosRequest;
use App\Http\Requests\UpdateIngresosRequest;
use Illuminate\Http\Request;

class IngresosController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = Ingresos::class;
        $this->ruta = 'Ingresos';
    }
    public function query(Request $request)
    {
        try {
            $search = $request->input('query', '');
            $datas = $this->model::query()
                ->where('status_autorizacion', 'LIKE', "%{$search}%")
                ->orWhere('detalle', 'LIKE', "%{$search}%")
                ->orWhere('propiedad_id', 'LIKE', "%{$search}%")
                ->orWhere('sub_propiedad_id', 'LIKE', "%{$search}%")
                ->orWhere('guardia_id', 'LIKE', "%{$search}%")
                ->orWhere('vehiculo_id', 'LIKE', "%{$search}%")
                ->orWhere('ingresante_id', 'LIKE', "%{$search}%")
                ->orWhere('user_id', 'LIKE', "%{$search}%")
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
    public function store(StoreIngresosRequest $request)
    {
        try {
            $ingreso = Ingresos::create($request->validated());
            return ApiResponse::success($ingreso, 'Ingreso creado exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al crear el ingreso', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingresos $ingresos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingresos $ingresos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngresosRequest $request, Ingresos $ingresos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingresos $ingresos)
    {
        //
    }
}
