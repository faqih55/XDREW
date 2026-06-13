public function handle(Request $request, Closure $next)
{
    if ($request->user() && $request->user()->role !== 'admin') {
        return redirect('/'); // User biasa dilempar ke home
    }
    return $next($request);
}