<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experiencias')->insert([
            'nombre' => '0 - 6 Months',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'nombre' => '6 Months - 1 Year',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'nombre' => '1 - 3 Years',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'nombre' => '3 - 5 Years',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'nombre' => '5 - 7 Years',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'nombre' => '7 - 10 Years',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'nombre' => '10 - 12 Years',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'nombre' => '12 - 15 Years',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //aca lo creo por que me lo pela todo el tiempo
        DB::table('users')->insert([
            'name' => 'carlos',
            'email' => 'correo@correo.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
