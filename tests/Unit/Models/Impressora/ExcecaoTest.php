<?php

/**
 * @see https://pestphp.com/docs/
 */

use App\Models\Impressora;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

test('lança exceção ao tentar cadastrar impressoras em duplicidade, isto é, com nomes iguais', function () {
    expect(
        fn () => Impressora::factory()
                            ->count(2)
                            ->create(['nome' => 'imp-22222'])
    )->toThrow(QueryException::class, 'Duplicate entry');
});

test('lança exceção ao tentar cadastrar impressora com campo inválido', function ($field, $value, $msg) {
    expect(
        fn () => Impressora::factory()
                            ->create([$field => $value])
    )->toThrow(QueryException::class, $msg);
})->with([
    ['nome', Str::random(256), 'Data too long for column'], //campo aceita no máximo 255 caracteres
    ['nome', null,             'cannot be null'],           //campo obrigatório
]);
