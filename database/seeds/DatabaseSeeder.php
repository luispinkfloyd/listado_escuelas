<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		$this->call(secundarios_caba::class);
		$this->call(superiores_caba::class);
		$this->call(secundarios_conurbano::class);
		$this->call(superiores_conurbano::class);
		//$this->call(usuarios::class);
    }
}
