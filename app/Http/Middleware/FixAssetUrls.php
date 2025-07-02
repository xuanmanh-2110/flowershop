<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FixAssetUrls
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (config('app.env') === 'production' && $response instanceof \Illuminate\Http\Response) {
            $content = $response->getContent();
            
            // Replace HTTP asset URLs with HTTPS
            $content = str_replace(
                'http://' . $request->getHost() . '/build/',
                'https://' . $request->getHost() . '/build/',
                $content
            );
            
            $response->setContent($content);
        }

        return $response;
    }
}