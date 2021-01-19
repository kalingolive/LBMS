<?php

namespace App\Entity;

use App\Repository\IndustriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IndustriesRepository::class)
 */
class Industries
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
     * @ORM\Column(type="integer")
     */
    private $Year;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="industries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subCategory;

    /**
     * @ORM\ManyToOne(targetEntity=BusinessType::class, inversedBy="industries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $businessType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $organizedType;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $TinNo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $startingCapital;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $CurCashCapital;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $CurAssetCapital;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $progressLevel;

    /**
     * @ORM\OneToMany(targetEntity=Address::class, mappedBy="industry")
     */
    private $addresses;

    /**
     * @ORM\OneToMany(targetEntity=Members::class, mappedBy="industry")
     */
    private $members;

    /**
     * @ORM\OneToMany(targetEntity=Employee::class, mappedBy="industry")
     */
    private $employees;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
        $this->members = new ArrayCollection();
        $this->employees = new ArrayCollection();
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

    public function getYear(): ?int
    {
        return $this->Year;
    }

    public function setYear(int $Year): self
    {
        $this->Year = $Year;

        return $this;
    }

    public function getSubCategory(): ?SubCategory
    {
        return $this->subCategory;
    }

    public function setSubCategory(?SubCategory $subCategory): self
    {
        $this->subCategory = $subCategory;

        return $this;
    }

    public function getBusinessType(): ?BusinessType
    {
        return $this->businessType;
    }

    public function setBusinessType(?BusinessType $businessType): self
    {
        $this->businessType = $businessType;

        return $this;
    }

    public function getOrganizedType(): ?string
    {
        return $this->organizedType;
    }

    public function setOrganizedType(string $organizedType): self
    {
        $this->organizedType = $organizedType;

        return $this;
    }

    public function getTinNo(): ?string
    {
        return $this->TinNo;
    }

    public function setTinNo(?string $TinNo): self
    {
        $this->TinNo = $TinNo;

        return $this;
    }

    public function getStartingCapital(): ?float
    {
        return $this->startingCapital;
    }

    public function setStartingCapital(?float $startingCapital): self
    {
        $this->startingCapital = $startingCapital;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getCurCashCapital(): ?float
    {
        return $this->CurCashCapital;
    }

    public function setCurCashCapital(?float $CurCashCapital): self
    {
        $this->CurCashCapital = $CurCashCapital;

        return $this;
    }

    public function getCurAssetCapital(): ?float
    {
        return $this->CurAssetCapital;
    }

    public function setCurAssetCapital(?float $CurAssetCapital): self
    {
        $this->CurAssetCapital = $CurAssetCapital;

        return $this;
    }

    public function getProgressLevel(): ?string
    {
        return $this->progressLevel;
    }

    public function setProgressLevel(string $progressLevel): self
    {
        $this->progressLevel = $progressLevel;

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setIndustry($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getIndustry() === $this) {
                $address->setIndustry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Members[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Members $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setIndustry($this);
        }

        return $this;
    }

    public function removeMember(Members $member): self
    {
        if ($this->members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getIndustry() === $this) {
                $member->setIndustry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(Employee $employee): self
    {
        if (!$this->employees->contains($employee)) {
            $this->employees[] = $employee;
            $employee->setIndustry($this);
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            // set the owning side to null (unless already changed)
            if ($employee->getIndustry() === $this) {
                $employee->setIndustry(null);
            }
        }

        return $this;
    }
}
