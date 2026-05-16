<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * AdminMiddleware
 *
 * Satpam rute /admin — hanya user dengan usertype = 'admin'
 * yang boleh melintas. Selain itu akan dikembalikan ke halaman
 * utama dengan pesan error, atau HTTP 403 jika request API.
 */
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login DAN memiliki usertype = 'admin'
        if ($request->user() && $request->user()->usertype === 'admin') {
            return $next($request);
        }

        // Jika request mengharapkan JSON (API), kembalikan 403
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Akses ditolak. Hanya admin yang diizinkan.',
            ], Response::HTTP_FORBIDDEN);
        }

        // Redirect ke halaman utama dengan pesan error
        return redirect()->route('home')
            ->with('error', 'Akses ditolak. Halaman ini khusus untuk admin.');
    }
}