<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $error)
    {

        if ($error instanceof APIError) {
            return response()->json([
                'error' => $error->getMessage()
            ], $error->getCode());
        }

        if ($error instanceof ValidationException) {
            return response()->json([
                'error' => $error->validator->errors()
            ], 400);
        }

        if ($error instanceof AuthorizationException) {
            return response()->json([
                'error' => 'Unauthorized Access'
            ], 401);
        }

        if ($error instanceof NotFoundHttpException) {
            return response()->json([
                'error' => 'Access Not Found'
            ], 404);
        }

        if ($error instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'No Results Found'
            ], 404);
        }

        return response()->json([
            'error' => "Internal Server Error: {$error}"
        ], 500);
    }
}
