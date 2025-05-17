<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\StatusIngresos;
use App\Http\Requests\StoreStatusIngresosRequest;
use App\Http\Requests\UpdateStatusIngresosRequest;
use Illuminate\Http\Request;

class StatusIngresosController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = StatusIngresos::class;
        $this->ruta = 'StatusIngresos';
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
    public function store(StoreStatusIngresosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusIngresos $statusIngresos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusIngresos $statusIngresos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusIngresosRequest $request, StatusIngresos $statusIngresos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusIngresos $statusIngresos)
    {
        //
    }
}
