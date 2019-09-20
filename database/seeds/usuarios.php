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
			['name' => 'Luis Rodriguez',
            'email' => 'luisrodriguez@untref.edu.ar',
            'password' => bcrypt('laika1')],
		]);
    }
}
