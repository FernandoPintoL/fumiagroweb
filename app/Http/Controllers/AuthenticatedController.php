<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (Auth::attempt($credentials)) {
                $user = User::where('email', $request->email)->first();
                Auth::login($user);
                if($user->hasRole('propietario')){
                    $user['role'] = "propietario";
                }
                return ApiResponse::success([
                    'user' => $user,
                ], 'Inicio de sesión exitoso', 200);
            } else {
                return ApiResponse::error('Las credenciales proporcionadas son incorrectas.', 401);
            }
        } catch (\Exception $e) {
            return ApiResponse::error('Se produjo un error durante el inicio de sesión.', 500, ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
