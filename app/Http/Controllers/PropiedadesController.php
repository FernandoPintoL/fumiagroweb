<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Propiedades;
use App\Http\Requests\StorePropiedadesRequest;
use App\Http\Requests\UpdatePropiedadesRequest;
use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    public $model;
    public $ruta;

    public function __construct()
    {
        $this->model = Propiedades::class;
        $this->ruta = 'Propiedades';
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
    public function store(StorePropiedadesRequest $request)
    {
        try {
            $data = Propiedades::create($request->validated());
            return ApiResponse::success($data, 'Propiedad creada exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al crear la propiedad', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Propiedades $propiedades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propiedades $propiedades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropiedadesRequest $request, Propiedades $propiedades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propiedades $propiedades)
    {
        //
    }
}
