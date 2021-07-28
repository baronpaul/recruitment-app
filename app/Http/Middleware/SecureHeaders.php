<?php
namespace App\Http\Middleware;
use Closure;

class SecureHeaders
{
    // Enumerate headers which you do not want in your application's responses.
    // Great starting point would be to go check out @Scott_Helme's:
    // https://securityheaders.com/
    private $unwantedHeaderList = [
        'X-Powered-By',
        'Server',
    ];

    public function handle($request, Closure $next)
    {
        $this->removeUnwantedHeaders($this->unwantedHeaderList);
        $response = $next($request);
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000');
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate, post-check=0, pre-check=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Feature-Policy',  "geolocation 'self'; sync-xhr 'self'");
        $response->headers->set('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
        //$response->headers->set('Expect-CT', "max-age=604800, report-uri='https://informedlms.report-uri.com/r/d/ct/enforce'");
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
        $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline' https://www.googletagmanager.com https://www.google.com https://www.gstatic.com  https://www.google-analytics.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com https://maxcdn.bootstrapcdn.com; img-src 'self' https://www.unitybankng.com https://www.google-analytics.com; worker-src 'self' https://www.unitybankng.com https://unitybankng.com; frame-src 'self' https://www.google.com https://www.gstatic.com ");
        return $response;
    }

    

    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header)
            header_remove($header);
    }

}
?>