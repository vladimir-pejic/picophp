<?php

namespace App\Middleware;

use PicoPHP\Base\MiddlewareInterface;
use PicoPHP\Base\Traits\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IdCheckMiddleware implements MiddlewareInterface {

    use JsonResponse;
    public function handle(Request $request, callable $next, array $params) {
        if (empty($params['id']) || !is_numeric($params['id'])) {
            return $this->jsonResponse(['error' => 'Invalid or Wrong ID'], Response::HTTP_BAD_REQUEST);
        }
        return $next($request);
    }
}


