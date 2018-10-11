<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class                    => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class                      => ['all' => true],
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class     => ['all' => true],
    Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle::class           => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class                     => ['all' => true],
    Lexik\Bundle\JWTAuthenticationBundle\LexikJWTAuthenticationBundle::class => ['all' => true],
    Gfreeau\Bundle\GetJWTBundle\GfreeauGetJWTBundle::class                   => ['all' => true],
    Gesdinet\JWTRefreshTokenBundle\GesdinetJWTRefreshTokenBundle::class      => ['all' => true],
    JMS\SerializerBundle\JMSSerializerBundle::class                          => ['all' => true],
    FOS\RestBundle\FOSRestBundle::class                                      => ['all' => true],

    // dev
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class                => ['dev' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class                              => ['dev' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class         => ['dev' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class                            => ['dev' => true],
];
