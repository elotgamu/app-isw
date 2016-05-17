<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Seeder;

class agregar_nueva_categoria_Test extends TestCase
{
    /*public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        Mockery::close();
    }*/

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_add_categoria()
    {
        //Route::enableFilters();
        $credenciales = [
           'name' => 'elver.galarga',
           'password' => 'Elver.Galarga',
       ];
        Auth::shouldReceive('attempt')
             ->once()
             ->with($credenciales)
             ->andReturn(true);
        //$this->withoutMiddleware();
        $this->call('POST', '/login', $credenciales);
        //$this->assertFalse($response->isOk());
        //App::instance('Illuminate\Auth\Manager', $this->getAuthMock(true));
        //$this->assertRedirectedToRoute('/mi_contenido', [] ,['flash']);
        $this->assertRedirectedToAction('contenidosController@create');
        //Auth::shouldReceive('user')->andReturn($user = m::mock('StdClass'));
        /*$this->visit('/mi_contenido')
             ->press('Agregar categoría nueva')
             ->type($faker->word, 'txtcategoria')
             ->type($faker->text, 'txtdescripcion')
             ->press('Guardar')
             ->seePageIs('http://app-isw.net/mi_contenido#');*/
    }
}
