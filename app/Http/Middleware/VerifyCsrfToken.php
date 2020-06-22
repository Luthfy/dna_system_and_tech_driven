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
        '/gqIG3BvtBVZ0yHF2vxmnl3WKkZWqTP1d4ebDpQJCGcBVeDKNbKV9ypyOYqNXGh4z/webhook',
    ];
}
