<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/videoclub2/public/login')
                    ->waitForText('Login')
                    ->type('email', 'usuario1@usuari1.com')
                    ->type('password','1234')
                    ->click('button[type="submit"]')
                    ->assertPathIs('/videoclub2/public/catalog')
                    ->pause(1000)
                    //
                    ->type('search','coronao')
                    ->click('button[type="submit"]')
                    ->pause(1000)
                    //
                    ->type('search','El Padrino')
                    ->click('button[type="submit"]')
                    ->pause(1000)
                    //
                    ->clickLink('El Padrino')
                    ->pause(1000);
                    //
                    $browser->driver->executeScript('window.scrollTo(0, 2000);');
                    //
                    $browser->pause(1000)
                    ->type('title', 'Vallejo quiero el 10')
                    ->select('stars', '5')
                    ->type('review', 'el 10')
                    ->press('Valorar')
                    ->pause(1000)
                    //
                    ->visit('/videoclub/public/catalog/create')
                    ->select('categoria', '1')
                    ->type('title', 'El virus')
                    ->type('año', '2020')
                    ->type('director', 'Wuhan')
                    ->type('imagen', 'aaa')
                    ->type('synopsis', 'Apocalipsis')
                    ->type('trailer', 'https://www.youtube.com/embed/EIG3rhSAnM8')
                    ->click('button[type="submit"]')
                    ->pause(5000);
                    $browser->driver->executeScript('window.scrollTo(0, 2000);');
                    $browser->pause(1000)
                    //
                    ->press('Cerrar sesión')
                    ->assertPathIs('/videoclub2/public/login')
                    ->pause(1000);
                    //
                   

        });
    }
}

