<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_PQR_Peticiones_Hechos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fecha_ini = date('2023-01-01');
        for ($i=1; $i < 101; $i++) {
            $fecha_generacion = date("Y-m-d",strtotime(date("Y-m-d",strtotime($fecha_ini."+ ".$i." days"))."+ ".rand(1,6)." days"));
            $fecha_radicado = date("d-m-Y",strtotime($fecha_generacion."+ 1 days"));
            $estado_asignacion = rand(0, 1);
            if ($estado_asignacion) {
                $estadospqr_id = 2;
            } else {
                $estadospqr_id = 1;
            }


            DB::table('pqr')->insert([
                'id' => $i,
                'radicado' => 'PQR-2023-'. $i,
                'empleado_id' => '6',
                'persona_id' => '4',
                'tipo_pqr_id' => rand(1, 3),
                'adquisicion' => 'Sede física',
                'sede_id' => '2',
                'tipo' => 'Producto',
                'referencia_id' => rand(1, 40),
                'prioridad_id' => '2',
                'factura' => 987654355+$i,
                'fecha_factura' => date("Y-m-d",strtotime($fecha_ini."+ ".$i." days")),
                'prorroga' => '0',
                'prorroga_dias' => '0',
                'prorroga_pdf' => 'NULL',
                'fecha_generacion' => $fecha_generacion,
                'fecha_radicado' => $fecha_radicado,
                'fecha_respuesta' => 'NULL',
                'tiempo_limite' => rand(15, 20),
                'estado_asignacion' => $estado_asignacion,
                'estadospqr_id' => $estadospqr_id,
                'estado_creacion' => '1',
                'recurso_aclaracion' => '0',
                'recurso_reposicion' => '0',
                'recurso_apelacion' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

        }
    }
}
