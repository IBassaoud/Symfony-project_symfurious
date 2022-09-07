<?php

namespace App\Entity;

use App\Repository\DriversRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DriversRepository::class)
 */
class Drivers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationality;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $furious_skill;

    /**
     * @ORM\Column(type="boolean")
     */
    private $entry_fee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $competition_point;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getFuriousSkill(): ?int
    {
        return $this->furious_skill;
    }

    public function setFuriousSkill(?int $furious_skill): self
    {
        $this->furious_skill = $furious_skill;

        return $this;
    }

    public function isEntryFee(): ?bool
    {
        return $this->entry_fee;
    }

    public function setEntryFee(bool $entry_fee): self
    {
        $this->entry_fee = $entry_fee;

        return $this;
    }

    public function getCompetitionPoint(): ?int
    {
        return $this->competition_point;
    }

    public function setCompetitionPoint(?int $competition_point): self
    {
        $this->competition_point = $competition_point;

        return $this;
    }
}
