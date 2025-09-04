<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Return a successful response with message.
     */
    protected function success(string $message = 'Operation completed successfully', $data = null, int $status = 200)
    {
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data
            ], $status);
        }

        return back()->with('success', $message);
    }

    /**
     * Return an error response with message.
     */
    protected function error(string $message = 'An error occurred', $errors = null, int $status = 422)
    {
        if (request()->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'errors' => $errors
            ], $status);
        }

        return back()->withErrors($errors ?? ['error' => $message]);
    }

    /**
     * Redirect with success message.
     */
    protected function redirectSuccess(string $route, string $message = 'Operation completed successfully')
    {
        return redirect()->route($route)->with('success', $message);
    }

    /**
     * Redirect with error message.
     */
    protected function redirectError(string $route, string $message = 'An error occurred')
    {
        return redirect()->route($route)->with('error', $message);
    }
}
