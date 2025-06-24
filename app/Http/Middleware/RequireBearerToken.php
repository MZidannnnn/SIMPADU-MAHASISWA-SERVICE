<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class RequireBearerToken
{
        /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');
        $role = $request->header('X-User-Role');

        if (!$token || !$role) {
            return response()->json([
                'message' => 'Token atau role tidak ditemukan di header.'
            ], 401);
        }

        // Configure the URL of your Auth service
        $authServiceUrl = env('AUTH_SERVICE_URL', 'http://127.0.0.1:8001'); // Ganti dengan URL service Auth Anda

        try {
            $response = Http::withHeaders([
                'Authorization' => $token,
                'X-User-Role' => $role,
            ])->post($authServiceUrl . '/api/validate-token');

            if ($response->successful() && $response->json('valid')) {
                // Token dan role valid, lanjutkan request
                return $next($request);
            } else {
                // Token atau role tidak valid
                Log::warning('Token validation failed: ' . $response->json('message', 'Unknown error'));
                return response()->json([
                    'message' => $response->json('message', 'Token tidak valid.'),
                ], $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Error communicating with Auth service: ' . $e->getMessage());
            return response()->json([
                'message' => 'Terjadi kesalahan saat berkomunikasi dengan service otentikasi.'
            ], 500);
        }
    }

}
