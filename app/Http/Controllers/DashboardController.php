<?php
namespace App\Http\Controllers;
use App\Models\{Cuenta,Transaccion};
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller {
 public function index(){
  $saldo=Cuenta::sum('saldo'); $ingresos=Transaccion::where('tipo','ingreso')->whereMonth('fecha',now()->month)->whereYear('fecha',now()->year)->sum('monto');
  $gastos=Transaccion::where('tipo','gasto')->whereMonth('fecha',now()->month)->whereYear('fecha',now()->year)->sum('monto');
  $cuentas=Cuenta::orderBy('nombre')->get(); $ultimas=Transaccion::with(['cuenta','categoria'])->orderByDesc('fecha')->orderByDesc('id')->take(6)->get();
  $porCategoria=Transaccion::select('categorias.nombre',DB::raw('SUM(transacciones.monto) as total'))->join('categorias','categorias.id','=','transacciones.categoria_id')->where('transacciones.tipo','gasto')->whereMonth('transacciones.fecha',now()->month)->whereYear('transacciones.fecha',now()->year)->groupBy('categorias.nombre')->orderByDesc('total')->get();
  return view('dashboard',compact('saldo','ingresos','gastos','cuentas','ultimas','porCategoria'));
 }
}
