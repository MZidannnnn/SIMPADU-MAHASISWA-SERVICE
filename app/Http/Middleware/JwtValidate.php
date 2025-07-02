<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtValidate
{
    public function handle(Request $request, Closure $next)
    {
        try {
            // HANYA CEK VALIDITAS TOKEN (SIGNATURE, EXPIRATION, DLL)
            // Method check() tidak akan mencoba mencari user di database.
            // Jika token tidak valid, baris ini akan melempar exception
            // yang akan ditangkap oleh blok catch di bawah.
            JWTAuth::parseToken()->check();

        } catch (TokenExpiredException $e) {
            // Token sudah kedaluwarsa
            return response()->json([
                'success' => false,
                'message' => 'Token telah kedaluwarsa.'
            ], 401);
        } catch (TokenInvalidException $e) {
            // Token tidak valid (misal: format salah atau signature tidak cocok)
            return response()->json([
                'success' => false,
                'message' => 'Token tidak valid.'
            ], 401);
        } catch (JWTException $e) {
            // Token tidak ada di dalam request atau format Bearer salah
            return response()->json([
                'success' => false,
                'message' => 'Token otentikasi tidak ditemukan.'
            ], 401);
        }

        // Jika tidak ada exception, berarti token VALID. Lanjutkan request.
        return $next($request);
    }
}