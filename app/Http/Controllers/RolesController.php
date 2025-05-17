<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public $model;
    public $ruta;
    public function __construct()
    {
        $this->model = Role::class;
        $this->ruta = 'Roles';
    }
    public function query(Request $request){
        try{
            $search = $request->input('query', '');
            $datas = $this->model::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('guard_name', 'LIKE', "%{$search}%")
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
    public function store(StoreRolesRequest $request)
    {
        try {
            $data = $this->model::create($request->validated());
            return ApiResponse::success($data, 'Rol creado exitosamente', 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al crear el rol', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolesRequest $request, Role $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $roles)
    {
        //
    }
}
