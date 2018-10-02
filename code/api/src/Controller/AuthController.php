<?php

namespace MeetMatt\Colla\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController
{
    /**
     * @Route("/api/v1/auth/token")
     * @Method({"POST"})
     *
     * @return Response
     */
    public function getTokenAction(): Response
    {
        // The security layer will intercept this request
        return new Response('', 401);
    }
}