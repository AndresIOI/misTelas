<?php

use Illuminate\Database\Seeder;

class ClasificacionTipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 1,
                    'tipo_id' => 1,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 1,
                    'tipo_id' => 2,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 1,
                    'tipo_id' => 3,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 1,
                    'tipo_id' => 6,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 1,
                    'tipo_id' => 7,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 1,
                    'tipo_id' => 9,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 1,
                    'tipo_id' => 11,
                ]);

                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 2,
                    'tipo_id' => 1,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 2,
                    'tipo_id' => 2,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 2,
                    'tipo_id' => 4,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 2,
                    'tipo_id' => 7,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 3,
                    'tipo_id' => 1,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 3,
                    'tipo_id' => 2,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 3,
                    'tipo_id' => 7,
                ]);

                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 4,
                    'tipo_id' => 1,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 4,
                    'tipo_id' => 2,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 4,
                    'tipo_id' => 7,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 5,
                    'tipo_id' => 1,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 5,
                    'tipo_id' => 2,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 5,
                    'tipo_id' => 3,
                ]);
                DB::table('clasificacion_tipo')->insert([
                    'clasificacion_id' => 5,
                    'tipo_id' => 7,
                ]);
    }
}
