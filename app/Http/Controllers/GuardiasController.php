<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Guardias;
use App\Http\Requests\StoreGuardiasRequest;
use App\Http\Requests\UpdateGuardiasRequest;
use Illuminate\Http\Request;

class GuardiasController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = Guardias::class;
        $this->ruta = 'Guardias';
    }
    public function query(Request $request){
        try{
            $search = $request->input('query', '');
            $datas = $this->model::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('detalle', 'LIKE', "%{$search}%")
                ->orderBy('id', 'desc')
                ->get();
            return ApiResponse::success($datas, 'Consulta exitosa', 200);
        }catch (\Exception $e){
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
    public function store(StoreGuardiasRequest $request)
    {
        try {
            $data = $this->model::create($request->validated());
            return ApiResponse::success($data, 'Guardia creado exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al crear el guardia', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Guardias $guardias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardias $guardias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuardiasRequest $request, Guardias $guardias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guardias $guardias)
    {
        //
    }
}
