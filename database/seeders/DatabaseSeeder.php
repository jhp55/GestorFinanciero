<?php
namespace Database\Seeders;
use App\Models\{User,Categoria,Cuenta,Transaccion};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder {
 public function run(): void {
  $user=User::firstOrCreate(['email'=>'demo@gestor.com'],['name'=>'Usuario Demo','password'=>Hash::make('password')]);
  $salario=Categoria::firstOrCreate(['nombre'=>'Salario'],['tipo'=>'ingreso','descripcion'=>'Ingresos laborales']);
  $otros=Categoria::firstOrCreate(['nombre'=>'Otros ingresos'],['tipo'=>'ingreso','descripcion'=>'Ingresos adicionales']);
  $alimentacion=Categoria::firstOrCreate(['nombre'=>'Alimentación'],['tipo'=>'gasto','descripcion'=>'Compras y comidas']);
  $transporte=Categoria::firstOrCreate(['nombre'=>'Transporte'],['tipo'=>'gasto','descripcion'=>'Movilidad']);
  $servicios=Categoria::firstOrCreate(['nombre'=>'Servicios'],['tipo'=>'gasto','descripcion'=>'Servicios del hogar']);
  $principal=Cuenta::firstOrCreate(['nombre'=>'Cuenta principal'],['descripcion'=>'Cuenta para la prueba de saldo','saldo'=>200000,'moneda'=>'COP']);
  $ahorros=Cuenta::firstOrCreate(['nombre'=>'Ahorros'],['descripcion'=>'Ahorro personal','saldo'=>500000,'moneda'=>'COP']);
  $efectivo=Cuenta::firstOrCreate(['nombre'=>'Efectivo'],['descripcion'=>'Dinero en efectivo','saldo'=>100000,'moneda'=>'COP']);
  if(Transaccion::count()===0){
   $rows=[
    [$principal,$salario,'ingreso',150000,'2026-11-01','Ingreso de prueba'],
    [$principal,$alimentacion,'gasto',20000,'2026-11-02','Gasto de prueba'],
    [$ahorros,$otros,'ingreso',80000,'2026-11-03','Ingreso adicional'],
    [$efectivo,$transporte,'gasto',15000,'2026-11-04','Transporte'],
    [$efectivo,$servicios,'gasto',10000,'2026-11-05','Pago de servicio'],
   ];
   foreach($rows as [$cuenta,$categoria,$tipo,$monto,$fecha,$descripcion]){
    Transaccion::create(['cuenta_id'=>$cuenta->id,'categoria_id'=>$categoria->id,'tipo'=>$tipo,'monto'=>$monto,'fecha'=>$fecha,'descripcion'=>$descripcion,'creado_por'=>$user->name]);
    $cuenta->saldo=$tipo==='ingreso'?(float)$cuenta->saldo+$monto:(float)$cuenta->saldo-$monto; $cuenta->save();
   }
  }
 }
}
