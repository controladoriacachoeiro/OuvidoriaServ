<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/loginApp',
        '/listarDemandasFeed',
        '/listarMinhasDemandas',
        '/inserirUsuario',
        '/listarUsuarioDemanda',
        '/inserirDemanda',
        '/colaborarPositivamente',
        '/colaborarNegativamente',
        '/listarDemanda',
        '/deslogarApp',
        '/consultarDenunciaAnonima',
        '/inserirDenunciaAnonima',
    ];
}
