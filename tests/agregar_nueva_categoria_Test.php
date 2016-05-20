<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Seeder;


class agregar_nueva_categoria_Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_add_categoria()
    {
        $this->flushSession();
        $this->withoutMiddleware();

        $credenciales = array(
            'name' => 'elver.galarga',
            'password' => 'Elver.Galarga',
        );

        Auth::shouldReceive('attempt')
             ->once()
             ->with($credenciales)
             ->andReturn(true);

        $response = $this->call('POST', '/login', $credenciales);
        Validator::shouldReceive('make')
                 ->once()
                 ->andReturn(Mockery::mock(['fails' => 'true']));
        //$this->assertEquals(500, $response->getStatusCode());
        //$crawler = $this->followRedirects();
        //$this->assertInstanceOf('Illuminate\Http\RedirectResponse', $response);
        $this->assertEquals($this->baseUrl . '/mi_contenido', $response->getTargetUrl());

        //$this->assertResponseStatus(302);

        //$this->assertTrue($response->isRedirection());

        //$this->assertRedirectedTo('/mi_contenido');

        //$crawler = $this->followRedirect();
        //$this->assertRedirectedTo('/mi_contenido');

        //App::instance('Illuminate\Auth\Manager', $this->getAuthMock(true));
        //$this->assertRedirectedToRoute('mi_contenido');
        //$this->assertRedirectedToAction('contenidosController@create');
        //Auth::shouldReceive('user')->andReturn($user = m::mock('StdClass'));

        /*$faker = Faker\Factory::create();
        $user = new User(['name' => 'elver.galarga']);
        $this->be($user);
        $this->visit('/mi_contenido')
             ->press('Agregar categoría nueva')
             ->type($faker->word, 'txtcategoria')
             ->type($faker->text, 'txtdescripcion')
             ->press('Guardar')
             ->seePageIs('http://app-isw.net/mi_contenido#');*/
    }
}
