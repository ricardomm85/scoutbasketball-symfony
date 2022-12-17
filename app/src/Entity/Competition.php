<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
#[ORM\Table(name: 'competitions')]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 33)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'competition', targetEntity: CompetitionUrl::class)]
    private $competitionUrls;

    public function __construct()
    {
        $this->competitionUrls = new ArrayCollection();
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|CompetitionUrl[]
     */
    public function competitionUrls(): Collection
    {
        return $this->competitionUrls;
    }

    public function addCompetitionUrl(CompetitionUrl $competitionUrl): self
    {
        if (!$this->competitionUrls->contains($competitionUrl)) {
            $this->competitionUrls[] = $competitionUrl;
            $competitionUrl->setCompetition($this);
        }

        return $this;
    }

    public function removeCompetitionUrl(CompetitionUrl $competitionUrl): self
    {
        if ($this->competitionUrls->removeElement($competitionUrl)) {
            // set the owning side to null (unless already changed)
            if ($competitionUrl->competition() === $this) {
                $competitionUrl->setCompetition(null);
            }
        }

        return $this;
    }

}
