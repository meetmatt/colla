<?php

namespace MeetMatt\Colla\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\AccessorOrder;
use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="`user`")
 * @ORM\Entity()
 * @AccessorOrder("custom", custom = {"uuid", "email", "isActive", "roles"})
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
     * @ORM\Column(type="string", length=255)
     * @Serializer\Exclude()
     *
     * @var string
     */
    private $password;

    /**
     * @ORM\Column(type="json", length=255)
     *
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
        $this->uuid = Uuid::uuid4();
        $this->email = $email;
        $this->roles = $roles;
        $this->isActive = true;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->getEmail();
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function updatePassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function deactivate(): void
    {
        $this->isActive = false;
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public static function createFromPayload($username, array $payload)
    {
        $user = new self($username);

        if (isset($payload['id'])) {
            $user->id = $payload['id'];
        }
        if (isset($payload['roles'])) {
            $user->roles = $payload['roles'];
        }
        if (isset($payload['is_active'])) {
            $user->isActive = $payload['is_active'];
        }
        if (isset($payload['uuid'])) {
            $user->uuid = Uuid::fromString($payload['uuid']);
        }

        return $user;
    }
}