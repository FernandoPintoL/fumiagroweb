<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{
    DetalleIngresosController,
    GaleriaIngresantesController,
    GaleriaVehiculosController,
    GuardiasController,
    IngresantesController,
    IngresosController,
    PermissionsController,
    PropiedadesController,
    RolesController,
    StatusIngresosController,
    SubPropiedadesController,
    TipoDocumentosController,
    TipoEspaciosController,
    TipoPropiedadesController,
    TipoVehiculosController,
    VehiculosController,
};

$controllers = [
    'detallesIngresos' => DetalleIngresosController::class,
    'galeriaIngresantes' => GaleriaIngresantesController::class,
    'galeriaVehiculos' => GaleriaVehiculosController::class,
    'guardias' => GuardiasController::class,
    'ingresantes' => IngresantesController::class,
    'ingresos' => IngresosController::class,
    'permissions' => PermissionsController::class,
    'propiedades' => PropiedadesController::class,
    'roles' => RolesController::class,
    'statusIngresos' => StatusIngresosController::class,
    'subPropiedades' => SubPropiedadesController::class,
    'tipoDocumentos' => TipoDocumentosController::class,
    'tipoEspacios' => TipoEspaciosController::class,
    'tipoPropiedades' => TipoPropiedadesController::class,
    'tipoVehiculos' => TipoVehiculosController::class,
    'vehiculos' => VehiculosController::class,
];

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

foreach ($controllers as $key => $controller) {
    Route::resource("/$key", $controller);
    Route::post("/$key/query", [$controller, 'query'])->name("$key.query");
}

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
