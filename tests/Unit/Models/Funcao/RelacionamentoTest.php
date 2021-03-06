<?php

/**
 * @see https://pestphp.com/docs/
 */

use App\Models\Funcao;
use App\Models\Usuario;

test('o relacionamento com os usuários está funcionando', function () {
    $amount = 3;

    Funcao::factory()
            ->has(Usuario::factory()->count($amount), 'usuarios')
            ->create();

    $funcao = Funcao::with('usuarios')->first();

    expect($funcao->usuarios->random())->toBeInstanceOf(Usuario::class)
    ->and($funcao->usuarios)->toHaveCount($amount);
});
