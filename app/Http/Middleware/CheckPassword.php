<?php

namespace App\Http\Middleware;

use Closure;

class CheckPassword
{
	/**
	 * Проверка пароля
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 *
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (
			$request->has('password') &&
			$request->input('password') == md5(env('PASSWORD'))
		) {
			return $next($request);
		} else {
			return abort(401, 'Unauthorized');
		}

	}
}
