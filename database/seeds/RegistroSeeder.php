<?php

use Illuminate\Database\Seeder;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Negocio::class, 5)->create()->each(function ($u){
            $u->user()->save(factory(App\User::class)->make());
        });
    }
}
