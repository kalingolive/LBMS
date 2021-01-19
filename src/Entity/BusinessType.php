<?php

namespace App\Entity;

use App\Repository\BusinessTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BusinessTypeRepository::class)
 */
class BusinessType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Industries::class, mappedBy="businessType")
     */
    private $industries;

    public function __construct()
    {
        $this->industries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Industries[]
     */
    public function getIndustries(): Collection
    {
        return $this->industries;
    }

    public function addIndustry(Industries $industry): self
    {
        if (!$this->industries->contains($industry)) {
            $this->industries[] = $industry;
            $industry->setBusinessType($this);
        }

        return $this;
    }

    public function removeIndustry(Industries $industry): self
    {
        if ($this->industries->removeElement($industry)) {
            // set the owning side to null (unless already changed)
            if ($industry->getBusinessType() === $this) {
                $industry->setBusinessType(null);
            }
        }

        return $this;
    }
}
