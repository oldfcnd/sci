<?php

/**
 * @see https://pestphp.com/docs/
 */

use App\Models\PerfilPermanente;

test('consegue cadastrar mĂșltiplos perfis permanentes', function () {
    $amount = 30;

    PerfilPermanente::factory()
                    ->count($amount)
                    ->create();

    expect(PerfilPermanente::count())->toBe($amount);
});
