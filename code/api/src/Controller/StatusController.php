<?php

namespace MeetMatt\Colla\Controller;

use Doctrine\DBAL\Connection;
use JMS\Serializer\SerializerInterface;
use MeetMatt\Colla\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/status", name="metrics_")
 */
class StatusController extends AbstractController
{
    /**
     * @Route("/ping", methods="GET", name="ping")
     *
     * @param SerializerInterface $serializer
     *
     * @return Response
     */
    public function ping(SerializerInterface $serializer): Response
    {
        return new Response($serializer->serialize([
            'status' => 'PONG',
            'user' => $this->getUser()
        ], 'json'), 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/health", methods="GET", name="health")
     *
     * @param Connection $connection
     *
     * @return JsonResponse
     */
    public function health(Connection $connection): JsonResponse
    {
        $databasePingResult = $connection->ping();
        $status = $databasePingResult;

        return new JsonResponse(
            [
                'status' => $status ? 'OK' : 'FAIL',
                'database' => $databasePingResult ? 'OK' : 'FAIL',
                'timestamp' => time(),
            ]
        );
    }
}
