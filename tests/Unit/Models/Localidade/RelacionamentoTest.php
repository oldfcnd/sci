<?php

/**
 * @see https://pestphp.com/docs/
 */

use App\Models\Localidade;
use App\Models\Servidor;

test('o relacionamento n:m com os servidores está funcionando', function () {
    $amount = 4;

    Localidade::factory()
                ->has(Servidor::factory()->count($amount), 'servidores')
                ->create();

    $localidade = Localidade::with('servidores')->first();

    expect($localidade->servidores->random())->toBeInstanceOf(Servidor::class)
    ->and($localidade->servidores)->toHaveCount($amount);
});
