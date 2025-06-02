<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TwoFactorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user->email !== env('MAIN_ADMIN_EMAIL')) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if (!Session::has('2fa_passed')) {
            $code = $request->input('2fa_code');
            if (!$code || !$this->verify2FA($user, $code)) {
                return response()->json(['error' => '2FA Salah atau tidak dikirim'], 403);
            }
            Session::put('2fa_passed', true);
        }

        return $next($request);
    }

    private function verify2FA($user, $code)
    {
        return $code === '123456'; // Ganti dengan verifikasi Google2FA asli
    }
}
