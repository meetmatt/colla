<?php

namespace MeetMatt\Colla\Controller;

use MeetMatt\Colla\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class ApiController extends AbstractController
{
    /**
     * @return User
     */
    protected function getUser()
    {
        return parent::getUser();
    }
}
