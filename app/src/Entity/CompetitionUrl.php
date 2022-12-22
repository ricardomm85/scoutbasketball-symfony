<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CompetitionUrlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionUrlRepository::class)]
#[ORM\Table(name: 'competition_urls')]
class CompetitionUrl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\Column(options: ['default' => 0])]
    private ?bool $enabled = null;

    #[ORM\ManyToOne(targetEntity: Competition::class, inversedBy: 'competition')]
    private ?Competition $competition = null;

    public function id(): ?int
    {
        return $this->id;
    }

    public function url(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function competition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): void
    {
        $this->competition = $competition;
    }
}
