<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * Os URIs que devem ser acessíveis durante a manutenção.
     *
     * @var array<int, string>
     *
     * @phpstan-ignore-next-line
     */
    protected $except = [
        //
    ];
}

