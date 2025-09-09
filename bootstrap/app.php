<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        /**
         * 🔐 Web Middleware Group
         */
        $middleware->appendToGroup('web', EncryptCookies::class);
        $middleware->appendToGroup('web', AddQueuedCookiesToResponse::class);
        $middleware->appendToGroup('web', StartSession::class);
        $middleware->appendToGroup('web', ShareErrorsFromSession::class);
        $middleware->appendToGroup('web', VerifyCsrfToken::class);

        /**
         * 🔐 API Middleware Group (เช่นสำหรับ SPA + Sanctum)
         */
        $middleware->appendToGroup('api', EnsureFrontendRequestsAreStateful::class);
        $middleware->appendToGroup('api', StartSession::class); // ใช้ session ร่วมได้ถ้าต้องใช้ flash หรือ error

        /**
         * 🧠 Route Middleware Aliases
         */
        $middleware->alias([
            'is_admin' => \App\Http\Middleware\IsAdmin::class,
            // 'is_in_group' => \App\Http\Middleware\IsInGroup::class, // ใช้เพิ่มได้ภายหลัง
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // คุณสามารถเพิ่ม custom handler ได้ เช่น reportable(...) หรือ renderable(...)
    })
    ->create();
