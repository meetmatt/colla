<?php

namespace MeetMatt\Colla\Controller;

use MeetMatt\Colla\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends AbstractController
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

    /**
     * @Route("/api/v1/user/register")
     * @Method({"POST"})
     *
     * @return Response
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new User($request->request->get('username'), ['ROLE_USER']);
        $password = $encoder->encodePassword($user, $request->request->get('password'));
        $user->updatePassword($password);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new JsonResponse(['status' => 'OK']);
    }
}