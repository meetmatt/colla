<?php

namespace MeetMatt\Colla\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/status", name="metrics_")
 */
class MetricsController extends ApiController
{
    /**
     * @Route("/ping", methods="GET")
     *
     * @return Response
     */
    public function ping(): Response
    {
        return new Response('pong');
    }

    /**
     * @Route("/health", methods="GET")
     *
     * @return JsonResponse
     */
    public function health(Connection $connection): JsonResponse
    {
        $databasePingResult = $connection->ping();
        $status = $databasePingResult;

        return $this->respond(
            [
                'status'    => $status ? 'OK' : 'FAIL',
                'database'  => $databasePingResult ? 'OK' : 'FAIL',
                'timestamp' => time(),
            ]
        );
    }
}
