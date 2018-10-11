<?php

namespace MeetMatt\Colla\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use MeetMatt\Colla\Entity\User;

class JWTCreatedListener
{
    /**
     * @param JWTCreatedEvent $event
     */
    public function onJWTCreated(JWTCreatedEvent $event): void
    {
        /** @var User $user */
        $user = $event->getUser();

        $payload = $event->getData();
        $payload['id'] = $user->getId();
        $payload['uuid'] = $user->getUuid();
        $payload['is_active'] = $user->isActive();

        $event->setData($payload);
    }
}