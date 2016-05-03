<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistroUsuarioTest extends TestCase
{
    //use DatabaseMigrations;
    /*
    * Insertamos datos en el formulario de registro
    * los datos se generan con el uso de Factorys
    */
    public function testUserRegister()
    {
        $faker = Faker\Factory::create();
        $propietario = $faker->name;
        $this->visit('/registro')
             ->type($faker->company, 'nombre')
             ->type($faker->text, 'descripcion')
             ->type($faker->address, 'direccion')
             ->type($faker->phoneNumber, 'telefono')
             ->type($propietario, 'propietario')
             ->type($faker->email, 'correo')
             ->type($propietario, 'usuario')
             ->type(bcrypt(str_random(10)), 'contraseña')
             ->press('Registrar')
             ->seePageIs('http://app-isw.net');

    }
}
