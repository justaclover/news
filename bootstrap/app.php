<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        apiPrefix: 'api-news'
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
//        $exceptions->render(function (BadRequestHttpException $e, Request $request) {
//            if ($request->is('api-news/*')) {
//                return response()->json([
//                    "error" => [
//                        "code" => 400,
//                        "message" => $e->getMessage(),
//                        "errors" => [
//                            $e->getTrace()
//                        ]
//                    ]
//                ]);
//            }
//        });
    })->create();
