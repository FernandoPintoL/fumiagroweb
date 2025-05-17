<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Propietarios;
use App\Http\Requests\StorePropietariosRequest;
use App\Http\Requests\UpdatePropietariosRequest;
use Illuminate\Http\Request;

class PropietariosController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = Propietarios::class;
        $this->ruta = 'Propietarios';
    }
    public function query(Request $request)
    {
        try {
            $search = $request->input('query', '');
            $datas = $this->model::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('nroDocumento', 'LIKE', "%{$search}%")
                ->orWhere('celular', 'LIKE', "%{$search}%")
                ->orWhere('tipo_documento_id', 'LIKE', "%{$search}%")
                ->orWhere('user_id', 'LIKE', "%{$search}%")
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
    public function store(StorePropietariosRequest $request)
    {
        try {
            $data = $this->model::create($request->validated());
            return ApiResponse::success($data, 'Propietario creado exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error Exception', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Propietarios $propietarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propietarios $propietarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropietariosRequest $request, Propietarios $propietarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propietarios $propietarios)
    {
        //
    }
}
