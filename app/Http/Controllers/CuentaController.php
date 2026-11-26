<?php
namespace App\Http\Controllers;
use App\Models\Cuenta; use Illuminate\Http\Request;
class CuentaController extends Controller {
 public function index(){ $cuentas=Cuenta::withCount('transacciones')->orderBy('nombre')->get(); return view('cuentas.index',compact('cuentas')); }
 public function create(){ return view('cuentas.create',['cuenta'=>new Cuenta]); }
 public function store(Request $r){ $d=$r->validate(['nombre'=>'required|string|max:150','descripcion'=>'nullable|string|max:255','saldo'=>'required|numeric|min:0','moneda'=>'required|string|max:10']); Cuenta::create($d); return redirect()->route('cuentas.index')->with('success','Cuenta creada correctamente.'); }
 public function edit(Cuenta $cuenta){ return view('cuentas.edit',compact('cuenta')); }
 public function update(Request $r,Cuenta $cuenta){ $d=$r->validate(['nombre'=>'required|string|max:150','descripcion'=>'nullable|string|max:255','saldo'=>'required|numeric|min:0','moneda'=>'required|string|max:10']); $cuenta->update($d); return redirect()->route('cuentas.index')->with('success','Cuenta actualizada.'); }
 public function destroy(Cuenta $cuenta){ if($cuenta->transacciones()->exists()) return back()->with('error','No se puede eliminar: la cuenta tiene movimientos asociados.'); $cuenta->delete(); return back()->with('success','Cuenta eliminada.'); }
}
