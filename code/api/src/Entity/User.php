<?php

namespace MeetMatt\Colla\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="MeetMatt\Colla\Repository\UserRepository")
 */
class User implements UserInterface, JWTUserInterface
{
    use EntityIdTrait;

    /**
     * @ORM\Column(type="string", length=254, unique=true)
     *
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     * @Serializer\Exclude()
     *
     * @var string
     */
    private $password;

    /**
     * @var string[]
     */
    private $roles;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     *
     * @var bool
     */
    private $isActive;

    public function __construct(string $email, array $roles = ['ROLE_USER'])
    {
        $this->isActive = true;
        $this->email = $email;
        $this->roles = $roles;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->getEmail();
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public static function createFromPayload($email, array $payload)
    {
        return new self(
            $email,
            $payload['roles'] ?? ['ROLE_USER']
        );
    }
}