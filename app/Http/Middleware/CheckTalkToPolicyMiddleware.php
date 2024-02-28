<?php

namespace App\Http\Middleware;

use App\Policies\UserPolicy;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckTalkToPolicyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $userPolicy;

    public function __construct(UserPolicy $userPolicy)
    {
        $this->userPolicy = $userPolicy;
    }
    public function handle($request, Closure $next)
    {

        $user = $request->route('user');

        if (!$this->userPolicy->talkTo(Auth::user(), $user)) {

            throw new AuthorizationException('You are not authorized to talk to this user.');
        }

        return $next($request);
    }
}
