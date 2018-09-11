<?php

namespace MeetMatt\Colla\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/metrics", name="metrics_")
 */
class MetricsController extends ApiController
{
    /**
     * @Route("/status", methods="GET")
     *
     * @return JsonResponse
     */
    public function health(): JsonResponse
    {
        return $this->respond(
            [
                'status'    => 'OK',
                'timestamp' => time(),
            ]
        );
    }
}
