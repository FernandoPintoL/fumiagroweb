<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthenticatedController,
    TipoDocumentosController,
    TipoEspaciosController,
    TipoPropiedadesController,
    TipoVehiculosController,
    IngresantesController,
    IngresosController,
    PropiedadesController,
    SubPropiedadesController,
    VehiculosController,
    GaleriaIngresantesController,
    GaleriaVehiculosController,
    GuardiasController,
    DetalleIngresosController,
    StatusIngresosController,
};

$controllers = [
    'tipodocumento' => TipoDocumentosController::class,
    'tipoespacio' => TipoEspaciosController::class,
    'tipopropiedad' => TipoPropiedadesController::class,
    'tipovehiculo' => TipoVehiculosController::class,
    'ingresantes' => IngresantesController::class,
    'ingreso' => IngresosController::class,
    'propiedad' => PropiedadesController::class,
    'subpropiedad' => SubPropiedadesController::class,
    'vehiculos' => VehiculosController::class,
    'galeria-ingresantes' => GaleriaIngresantesController::class,
    'galeria-vehiculos' => GaleriaVehiculosController::class,
    'guardias' => GuardiasController::class,
    'detallesingresos' => DetalleIngresosController::class,
    'statusingresos' => StatusIngresosController::class,
];

Route::post('/app/login', [AuthenticatedController::class, 'store'])->name('app.login');
Route::post('/app/galeria-ingresantes/updload', [GaleriaIngresantesController::class, 'upload'])->name('app.galeria.ingresantes.upload');
Route::post('/app/galeria-visitantes/updload', [GaleriaIngresantesController::class, 'upload'])->name('app.galeria.visitantantes.upload');

foreach ($controllers as $key => $controller) {
    Route::post("/app/$key/store", [$controller, 'store'])->name("app.$key.store");
    Route::post("/app/$key/query", [$controller, 'query'])->name("app.$key.query");
}
