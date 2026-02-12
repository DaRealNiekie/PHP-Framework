<?php

declare(strict_types=1);

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "wegen")]
class Weg
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string")]
    private string $naam;

    #[ORM\Column(type: "string")]
    private string $locatie;

    #[ORM\Column(type: "integer")]
    private int $weglengte;

    #[ORM\Column(name: "huidige_temperatuur", type: "integer", nullable: true)]
    private ?int $huidigeTemperatuur = null;


    #[ORM\Column(name: "freq_0", type: "integer", options: ["default" => 0])]
    private int $freq0 = 0;


    #[ORM\Column(name: "freq_m5", type: "integer", options: ["default" => 0])]
    private int $freqM5 = 0;


    #[ORM\Column(name: "freq_m10", type: "integer", options: ["default" => 0])]
    private int $freqM10 = 0;

    #[ORM\Column(type: "integer", options: ["default" => 0])]
    private int $strooiduur = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): string
    {
        return $this->naam;
    }
    public function setNaam(string $naam): void
    {
        $this->naam = $naam;
    }

    public function getLocatie(): string
    {
        return $this->locatie;
    }
    public function setLocatie(string $locatie): void
    {
        $this->locatie = $locatie;
    }

    public function getWeglengte(): int
    {
        return $this->weglengte;
    }
    public function setWeglengte(int $weglengte): void
    {
        $this->weglengte = $weglengte;
    }

    public function getHuidigeTemperatuur(): ?int
    {
        return $this->huidigeTemperatuur;
    }
    public function setHuidigeTemperatuur(?int $temp): void
    {
        $this->huidigeTemperatuur = $temp;
    }

    public function setFreq0(int $freq): void
    {
        $this->freq0 = $freq;
    }
    public function getFreq0(): int
    {
        return $this->freq0;
    }

    public function setFreqM5(int $freq): void
    {
        $this->freqM5 = $freq;
    }
    public function getFreqM5(): int
    {
        return $this->freqM5;
    }

    public function setFreqM10(int $freq): void
    {
        $this->freqM10 = $freq;
    }
    public function getFreqM10(): int
    {
        return $this->freqM10;
    }

    public function getStrooiduur(): int
    {
        return $this->strooiduur;
    }
    public function setStrooiduur(int $strooiduur): void
    {
        $this->strooiduur = $strooiduur;
    }
}