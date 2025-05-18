<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Ingresantes;
use App\Http\Requests\StoreIngresantesRequest;
use App\Http\Requests\UpdateIngresantesRequest;
use Illuminate\Http\Request;

class IngresantesController extends Controller
{
    public $model;
    public $ruta;
    public function __construct(){
        $this->model = Ingresantes::class;
        $this->ruta = 'Ingresantes';
    }
    public function query(Request $request){
        try{
            $search = $request->input('query', '');
            $datas = $this->model::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('nroDocumento', 'LIKE', "%{$search}%")
                ->orWhere('celular', 'LIKE', "%{$search}%")
                ->orWhere('is_permitido', 'LIKE', "%{$search}%")
                ->orWhere('tipo_documento_id', 'LIKE', "%{$search}%")
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
    public function store(StoreIngresantesRequest $request)
    {
        try {
            $data = $this->model::create($request->all());
            return ApiResponse::success($data, 'Ingresante creado exitosamente', 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al crear el ingresante', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingresantes $ingresantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingresantes $ingresantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngresantesRequest $request, Ingresantes $ingresantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingresantes $ingresantes)
    {
        //
    }
}
