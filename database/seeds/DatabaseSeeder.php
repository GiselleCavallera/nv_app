<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
	public function seedUsers(){
		
		$uadministrador = new User;
		$uhospedador = new User;
		$uhospedado = new User;

		//Creamos un usuario administrador
		$uadministrador->name = 'administrador1';
		$uadministrador->email = 'administrador1@gmail.com';
		$uadministrador->password = bcrypt('1');
		$uadministrador->tipo = 1;
		$uadministrador->save();

		//Creamos un usuario hospedador
		$uhospedador->name = 'hospedador1';
		$uhospedador->email = 'hospedador1@gmail.com';
		$uhospedador->password = bcrypt('1');
		$uhospedador->tipo = 2;
		$uhospedador->save();


		//Creamos un usuario hospedado
		$uhospedado->name = 'hospedado1';
		$uhospedado->email = 'hospedado1@gmail.com';
		$uhospedado->password = bcrypt('1');
		$uhospedado->tipo = 3;
		$uhospedado->save();

	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	self::seedUsers();
    	$this->command->info('Usuarios inicializados..');
        // $this->call(UsersTableSeeder::class);
    }
}
