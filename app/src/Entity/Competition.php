<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Stringable;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
#[ORM\Table(name: 'competitions')]
class Competition implements Stringable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 33, unique: true, nullable: false)]
    private string $name;

    #[ORM\Column(length: 62, unique: true, nullable: false)]
    private string $slug;

    /**
     * @var Collection<int, CompetitionUrl>
     */
    #[ORM\OneToMany(mappedBy: 'competition', targetEntity: CompetitionUrl::class)]
    private Collection $competitionUrls;

    public function __construct()
    {
        $this->competitionUrls = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, CompetitionUrl>
     */
    public function competitionUrls(): Collection
    {
        return $this->competitionUrls;
    }

    public function addCompetitionUrl(CompetitionUrl $competitionUrl): self
    {
        if ($this->competitionUrls->contains($competitionUrl) === false) {
            $this->competitionUrls[] = $competitionUrl;
            $competitionUrl->setCompetition($this);
        }

        return $this;
    }

    public function removeCompetitionUrl(CompetitionUrl $competitionUrl): self
    {
        $this->competitionUrls->removeElement($competitionUrl);

        return $this;
    }
}
