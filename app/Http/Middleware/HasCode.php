<?php

namespace App\Http\Middleware;

use App\Enumerat\UserType;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasCode
{
    public function handle(Request $request, Closure $next)
    {
        $user = User::query()->find(Auth::id());
        if ($user->role == UserType::Doctor) {
            if ($user->doctor?->code != null) {
                Auth::logout();
                return redirect()->back()->with('message', 'الرجاء الانتضار حتى تتم الموافقة من قبل الادمن');
            }
        }
        return $next($request);
    }
}
