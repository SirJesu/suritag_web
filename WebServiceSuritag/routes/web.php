<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("ame");

Route::get("/getUsers","UsuariosController@GetAll")->name("GetAllUsers");
Route::post("/RegistrarUsuario","UsuariosController@RegistrarUsuario")->name("RegistrarUsuario");
Route::post("/LoginU","UsuariosController@Login")->name("LoginUsuario");
Route::any("/UserbyId","UsuariosController@getUserById")->name("UsserByIdConsular");
Route::any("/userEdit","UsuariosController@EditarUsuario")->name("EditarUsuario");

Route::post("/RegistrarSitioF","SitiosController@RegistrarSitio")->name("RegistrarSitioFisico");
Route::get("/GetAllSitiosF","SitiosController@GetAllSitios")->name("ObtenerListaSitios");
Route::post("/GetSitioByIden","SitiosController@GetSitioByIdentificador")->name("getSitiosByIndentif@GetSitioByIdentificador");
Route::post("/GetSitioByUser","SitiosController@GetSitioByUser")->name("GetSitioByUser");
Route::any("/GetSitioById","SitiosController@GetSitiosById")->name("ObtenerSitioPorIdenficador");


Route::get("/TiposUsuario","TipoUsuariosController@getAll")->name("TiposUsuario");

Route::post("/RegistrarInformacionFinanciera","InformacionFinancieraController@AgregarEstadoFinanciero")->name("InformacionFinanciera");
Route::post("/ActualizarDatosFinancieros","InformacionFinancieraController@ActualizarDatos")->name("ActualizarInformacionFinanciera");
Route::post("/ConsultarMiInformacion","InformacionFinancieraController@ConsultarPorUsuario")->name("ConsultarPorUsuariosInfoFinanciera");

//Mesas

Route::post("/RegistrarMesas","MesasController@RegistrarMesa")->name("RegistrarMesas");
Route::post("/ActualizarMesa","MesasController@UpdateEstadoMesa")->name("ActualizarMesas");
Route::any("/MesasBySitio"  ,"MesasController@GetMesasBySitios")->name("MesasBySitiosC");
Route::any("/MesasByPiso"  ,"MesasController@MesasByPlantel")->name("MesasByPisoAll");


Route::any("/MenuBySitios","MenuesController@GetMenuBySite")->name("MenuBySitiosCotroller");
Route::any("/RegistrarMenu","MenuesController@RegistrarMenu")->name("RegistrarMenues");
Route::any("/EliminarMenuBySito","MenuesController@DeleteMenu")->name("ElimninarMenuSitio");

Route::get("/CategoriasAll","CategoriasController@GetAll")->name("ObtenerCategorias");
Route::post("/RegistroCat","CategoriasController@RegistrarCategoria")->name("RegistrarCategorias");
//testeado localmente  07/08/18

Route::post("/RegistrarOfertas","OfertasController@RegistrarOfertas")->name("RegistrarOferta");
Route::any("/ObtenerOfertas","OfertasController@ObtenerOfertasDisponibles")->name("OfertadDisponibles");
Route::any("/CambiarEstadoOferta","OfertasController@CambiarEstadoOferta")->name("CmabiarEstado");
Route::post("/ModificarOfertas","OfertasController@modificarOfertas")->name("modificarOfertas");

Route::any("/MakeReserva","ReservaController@HacerReserva")->name("MakeReservation");
Route::any("/getReservaPorUserName","ReservaController@getByUserName")->name("ReservaPorUsuario");
Route::any("/GetAllRservasSitio","ReservaController@ReservasPorSitio")->name("ReservasPorsitio");
Route::any("/ReservasPorSitio","ReservaController@HistorialReservasSitios")->name("HistorialDeReservasSito");
Route::any("/HistorialReservaUsuario","ReservaController@HistorialReservaUsuarios")->name("HistorialReservasPorUsuario");
Route::any("/OfertasDelSitio","OfertasController@OfertasBySitios")->name("OfertasPorSitios");

Route::any("/RegistrarPago","pagosController@MakePago")->name("RegistrarPagoPorReserva");
Route::any("/ConsultarPagoReserva","pagosController@ConsultarPagosPorReserva")->name("ConsultarPagos");
Route::get("/getAllPlans","preminumController@getTypePlan")->name("TipoPlan");
Route::get("/getClientes","UsuariosController@GetClients")->name("ClientesGetAll");
Route::any("/sendEmailConfirm","UsuariosController@AccessPlatform")->name("darAccesoPlataforma");
Route::any("/getByEmailUser","UsuariosController@getUserByEmail")->name("getUserByEmail");

Route::any("/RegistrarPiso","PisoController@CrearPiso")->name("RegistrarSitio");
Route::any("/DesabilitarPiso","PisoController@DesabilitarPiso")->name("RegistrarSitio");
Route::any("/ListaPisos","PisoController@ConsultarPisos")->name("PisosGetAll");
Route::any("/EditarPiso","PisoController@EditarPiso")->name("PisosEditar");
Route::any("/GetAllTiposOfertas","TiposOfertasController@GetAllTipos")->name("TiposOfertas");

Route::any("/GetMesasToReserve","MesasController@MesasDisponibles")->name("GetMesasDisponibles");


Route::any("/filterMenuTypeFoodSite","MenuesController@GeyMenuFilterType")->name("GetMenueByTipoFilter");

Route::any("/AddCreditCard","EpayCoController@AddCretidCard")->name("RegistrarTarjeta");

Route::any("/confirmedEmailUsuario","UsuariosController@ConfirmarEmail")->name("ConfirmarEmail");
Route::any("/CambiarPassUsuario","UsuariosController@CambiarPass")->name("CmabiarPassword");
Route::any("/cambiarEstadoReserva","ReservaController@CambiarEstadoReserva")->name("cambiarEstadoReserva");



