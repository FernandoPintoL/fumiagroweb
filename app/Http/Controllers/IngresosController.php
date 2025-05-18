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
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFin = $request->input('fecha_fin');
            $offset = $request->input('offset', 0); // desde qué registro empezar
            $limit = $request->input('limit', 10);  // cuántos registros traer


            $query = $this->model::with(['propiedad', 'subPropiedad', 'guardia', 'vehiculo', 'ingresante', 'user', 'detalleIngreso', 'detalleIngreso.statusIngreso'])
                ->where(function ($q) use ($search) {
                    $q->where('status_autorizacion', 'LIKE', "%{$search}%")
                        ->orWhere('detalle', 'LIKE', "%{$search}%")
                        ->orWhere('propiedad_id', 'LIKE', "%{$search}%")
                        ->orWhere('sub_propiedad_id', 'LIKE', "%{$search}%")
                        ->orWhere('guardia_id', 'LIKE', "%{$search}%")
                        ->orWhere('vehiculo_id', 'LIKE', "%{$search}%")
                        ->orWhere('ingresante_id', 'LIKE', "%{$search}%")
                        ->orWhere('user_id', 'LIKE', "%{$search}%");
                });

            if ($fechaInicio && $fechaFin) {
                $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
            } elseif ($fechaInicio) {
                $query->whereDate('created_at', '>=', $fechaInicio);
            } elseif ($fechaFin) {
                $query->whereDate('created_at', '<=', $fechaFin);
            }

            $datas = $query->orderBy('id', 'desc')
                ->skip($offset)
                ->take($limit)
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
            $ingreso = Ingresos::create($request->all());
            return ApiResponse::success($ingreso, 'Ingreso creado exitosamente', 200);
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
