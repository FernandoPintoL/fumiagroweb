<?php

namespace App\Http\Controllers;

use App\Models\SubPropiedades;
use App\Http\Requests\StoreSubPropiedadesRequest;
use App\Http\Requests\UpdateSubPropiedadesRequest;
use Illuminate\Http\Request;

class SubPropiedadesController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = SubPropiedades::class;
        $this->ruta = 'SubPropiedades';
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
            return response()->json($datas, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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
    public function store(StoreSubPropiedadesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubPropiedades $subPropiedades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubPropiedades $subPropiedades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubPropiedadesRequest $request, SubPropiedades $subPropiedades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubPropiedades $subPropiedades)
    {
        //
    }
}
