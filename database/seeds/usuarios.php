<?php

use Illuminate\Database\Seeder;

class usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			['name' => 'usuario_alumnos',
            'email' => 'alumnos@untref.edu.ar',
            'password' => bcrypt('20190319')],
			['name' => 'Luis Rodriguez',
            'email' => 'luisrodriguez@untref.edu.ar',
            'password' => bcrypt('laika1')],
		]);
    }
}
