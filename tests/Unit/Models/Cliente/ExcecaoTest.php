<?php

/**
 * @see https://pestphp.com/docs/
 */

use App\Models\Cliente;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

test('lança exceção ao tentar cadastrar clientes em duplicidade, isto é, com nomes iguais', function () {
    expect(
        fn () => Cliente::factory()
                        ->count(2)
                        ->create(['nome' => 'cpu-22222'])
    )->toThrow(QueryException::class, 'Duplicate entry');
});

test('lança exceção ao tentar cadastrar cliente com campo inválido', function ($field, $value, $msg) {
    expect(
        fn () => Cliente::factory()
                        ->create([$field => $value])
    )->toThrow(QueryException::class, $msg);
})->with([
    ['nome', Str::random(256), 'Data too long for column'], //campo aceita no máximo 255 caracteres
    ['nome', null,             'cannot be null'],           //campo obrigatório
]);
