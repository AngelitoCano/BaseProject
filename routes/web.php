<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Login\LoginController;
use App\Http\Controllers\Controles\ControlController;
use App\Http\Controllers\Backend\Roles\RolesController;
use App\Http\Controllers\Backend\Roles\PermisoController;
use App\Http\Controllers\Backend\Perfil\PerfilController;
use App\Http\Controllers\Backend\Configuracion\ConfiguracionController;
use App\Http\Controllers\Backend\Registro\RegistroController;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\tablaProductoController;
use App\Http\Controllers\CartController;
use PhpParser\Builder\Use_;
use App\Models\Product;

use App\Http\Controllers\Backend\Dashboard\DashboardController;


//ruta del carrito
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');

// ✅ Ruta que falta: eliminar un producto del carrito
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// ✅ Ruta para vaciar el carrito
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

Route::patch('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');


//calculadora
Route::get('/calculadora', [CalculadoraController::class, 'formulario'])->name('calculadora');
Route::post('/calculadora', [CalculadoraController::class, 'calcular'])->name('soap.calcular');

// Productos route
Route::get('tablaProductos/usuario', [tablaProductoController::class, 'usuarioProductos'])->name('tablaProductos.usuarioProductos');
Route::resource('tablaProductos', tablaProductoController::class)->names([
    'index' => 'tablaProductos.indexProductos',
    'create' => 'tablaProductos.create',
    'store' => 'tablaProductos.store',
    'show' => 'tablaProductos.show',
    'edit' => 'tablaProductos.edit',
    'update' => 'tablaProductos.update',
    'destroy' => 'tablaProductos.destroy'
]);

// --- LOGIN ---

Route::get('/', [LoginController::class,'index'])->name('login');

Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// --- CONTROL WEB ---

Route::get('/panel', [ControlController::class,'indexRedireccionamiento'])->name('admin.panel');

// --- ROLES ---

Route::get('/admin/roles/index', [RolesController::class,'index'])->name('admin.roles.index');
Route::get('/admin/roles/tabla', [RolesController::class,'tablaRoles']);
Route::get('/admin/roles/lista/permisos/{id}', [RolesController::class,'vistaPermisos']);
Route::get('/admin/roles/permisos/tabla/{id}', [RolesController::class,'tablaRolesPermisos']);
Route::post('/admin/roles/permiso/borrar', [RolesController::class, 'borrarPermiso']);
Route::post('/admin/roles/permiso/agregar', [RolesController::class, 'agregarPermiso']);
Route::get('/admin/roles/permisos/lista', [RolesController::class,'listaTodosPermisos']);
Route::get('/admin/roles/permisos-todos/tabla', [RolesController::class,'tablaTodosPermisos']);
Route::post('/admin/roles/borrar-global', [RolesController::class, 'borrarRolGlobal']);

// --- PERMISOS A USUARIOS ---

Route::get('/admin/permisos/index', [PermisoController::class,'index'])->name('admin.permisos.index');
Route::get('/admin/permisos/tabla', [PermisoController::class,'tablaUsuarios']);
Route::post('/admin/permisos/nuevo-usuario', [PermisoController::class, 'nuevoUsuario']);
Route::post('/admin/permisos/info-usuario', [PermisoController::class, 'infoUsuario']);
Route::post('/admin/permisos/editar-usuario', [PermisoController::class, 'editarUsuario']);
Route::post('/admin/permisos/nuevo-rol', [PermisoController::class, 'nuevoRol']);
Route::post('/admin/permisos/extra-nuevo', [PermisoController::class, 'nuevoPermisoExtra']);
Route::post('/admin/permisos/extra-borrar', [PermisoController::class, 'borrarPermisoGlobal']);

// --- PERFIL DE USUARIO ---
Route::get('/admin/editar-perfil/index', [PerfilController::class,'indexEditarPerfil'])->name('admin.perfil');
Route::post('/admin/editar-perfil/actualizar', [PerfilController::class, 'editarUsuario']);

// --- SIN PERMISOS VISTA 403 ---
Route::get('sin-permisos', [ControlController::class,'indexSinPermiso'])->name('no.permisos.index');

Route::get('/admin/dashboard', [DashboardController::class,'vistaDashboard'])->name('admin.dashboard.index');


