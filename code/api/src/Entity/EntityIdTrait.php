<?php

namespace MeetMatt\Colla\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Ramsey\Uuid\UuidInterface;

trait EntityIdTrait
{
    /**
     * The unique auto incremented primary key.
     *
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned": true})
     * @ORM\GeneratedValue
     *
     * @Serializer\Exclude()
     *
     * @var int|null
     */
    protected $id;

    /**
     * The internal primary identity key.
     *
     * @ORM\Column(type="uuid")
     * @Serializer\Type("uuid")
     *
     * @var UuidInterface
     */
    protected $uuid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }
}