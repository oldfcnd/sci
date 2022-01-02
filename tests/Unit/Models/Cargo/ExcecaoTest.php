<?php

/**
 * @link https://pestphp.com/docs/
 */

use App\Models\Cargo;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

test('lança exceção ao tentar cadastrar cargos em duplicidade, isto é, com ids iguais', function() {
    expect(

        fn() => Cargo::factory()
                        ->count(2)
                        ->create(['id' => 10])

    )->toThrow(QueryException::class, 'Duplicate entry');
});

test('lança exceção ao tentar cadastrar cargo com campo inválido', function($campo, $valor, $msg) {
    expect(

        fn() => Cargo::factory()
                        ->create([$campo => $valor])

    )->toThrow(QueryException::class, $msg);
})->with([
    ['id',   'texto',          'Incorrect integer value'],  //valor não conversível em inteiro
    ['id',   null,             'cannot be null'],           //campo obrigatório
    ['nome', Str::random(256), 'Data too long for column'], //campo aceita no máximo 255 caracteres
    ['nome', null,             'cannot be null']            //campo obrigatório
]);