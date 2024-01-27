<?php

namespace App\Entity;

use App\Repository\AlimentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimentoRepository::class)]
class Alimento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nome = null;

    #[ORM\Column(nullable: true)]
    private ?int $calorie = null;

    #[ORM\Column(nullable: true)]
    private ?int $proteine = null;

    #[ORM\Column(nullable: true)]
    private ?int $grassi = null;

    #[ORM\Column(nullable: true)]
    private ?int $carboidrati = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCalorie(): ?int
    {
        return $this->calorie;
    }

    public function setCalorie(?int $calorie): static
    {
        $this->calorie = $calorie;

        return $this;
    }

    public function getProteine(): ?int
    {
        return $this->proteine;
    }

    public function setProteine(?int $proteine): static
    {
        $this->proteine = $proteine;

        return $this;
    }

    public function getGrassi(): ?int
    {
        return $this->grassi;
    }

    public function setGrassi(?int $grassi): static
    {
        $this->grassi = $grassi;

        return $this;
    }

    public function getCarboidrati(): ?int
    {
        return $this->carboidrati;
    }

    public function setCarboidrati(?int $carboidrati): static
    {
        $this->carboidrati = $carboidrati;

        return $this;
    }
}
