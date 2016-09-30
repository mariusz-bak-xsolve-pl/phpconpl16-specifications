<?php

declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UnicornRepository")
 */
class Unicorn
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $color;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    private $birthDate;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    private $hasLaserHorn;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    private $poopsRainbows;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    private $canFly;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    private $fluffy;

    /**
     * @ORM\ManyToOne(targetEntity="Herd")
     *
     * @var Herd
     */
    private $herd;

    public function __construct(
        string $name = null,
        string $color = null,
        bool $hasLaserHorn = null,
        bool $poopsRainbows = null,
        bool $canFly = null,
        bool $fluffy = null
    ) {
        $this->name = $name;
        $this->color = $color;
        $this->hasLaserHorn = $hasLaserHorn;
        $this->poopsRainbows = $poopsRainbows;
        $this->canFly = $canFly;
        $this->fluffy = $fluffy;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function getBirthDate(): \DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function hasLaserHorn(): bool
    {
        return $this->hasLaserHorn;
    }

    public function setHasLaserHorn(bool $hasLaserHorn)
    {
        $this->hasLaserHorn = $hasLaserHorn;
    }

    public function poopsRainbows(): bool
    {
        return $this->poopsRainbows;
    }

    public function setPoopsRainbows(bool $poopsRainbows)
    {
        $this->poopsRainbows = $poopsRainbows;
    }

    public function canFly(): bool
    {
        return $this->canFly;
    }

    public function setCanFly(bool $canFly)
    {
        $this->canFly = $canFly;
    }

    public function isFluffy(): bool
    {
        return $this->fluffy;
    }

    public function setFluffy(bool $fluffy)
    {
        $this->fluffy = $fluffy;
    }

    public function getHerd(): Herd
    {
        return $this->herd;
    }

    public function setHerd(Herd $herd)
    {
        $this->herd = $herd;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'color' => $this->color,
            'hasLaserHorn' => $this->hasLaserHorn,
            'poopsRainbows' => $this->poopsRainbows,
            'canFly' => $this->canFly,
            'fluffy' => $this->fluffy,
        ];
    }

    public function toArray2()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'color' => $this->color,
            'birthDate' => $this->birthDate->format('Y-m-d'),
            'hasLaserHorn' => $this->hasLaserHorn,
            'poopsRainbows' => $this->poopsRainbows,
            'canFly' => $this->canFly,
            'fluffy' => $this->fluffy,
            'herdName' => ($this->herd instanceof Herd) ? $this->herd->getName() : '-None-',
        ];
    }
}
