<?php

declare(strict_types=1);

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "strooiwagen")]
class Strooiwagen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Weg::class)]
    #[ORM\JoinColumn(name: "weg_id", referencedColumnName: "id", nullable: false)]
    private Weg $weg;

    #[ORM\Column(type: "integer")]
    private int $temperatuur;

    #[ORM\Column(type: "integer")]
    private int $frequentie;

    public function getId(): int
    {
        return $this->id;
    }

    public function getWeg(): Weg
    {
        return $this->weg;
    }

    public function setWeg(Weg $weg): void
    {
        $this->weg = $weg;
    }

    public function getTemperatuur(): int
    {
        return $this->temperatuur;
    }

    public function setTemperatuur(int $temperatuur): void
    {
        $this->temperatuur = $temperatuur;
    }

    public function getFrequentie(): int
    {
        return $this->frequentie;
    }

    public function setFrequentie(int $frequentie): void
    {
        $this->frequentie = $frequentie;
    }
}