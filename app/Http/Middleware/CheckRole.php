<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $roles)
    {
        if (!Auth::check()) {
            // Redirect to login if the user is not logged in
            return redirect('/login');
        }

        $user = Auth::user();

        // Split the roles string into an array of roles
        $roles = explode('|', $roles);

        // Check if the user has any of the required roles
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        // Redirect or abort if the user does not have any of the required roles
        abort(403, 'Unauthorized action.');

        // Alternatively, you can redirect to a custom page:
        // return redirect('/custom-error-page');
    }
}
