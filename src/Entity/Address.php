<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddressRepository::class)
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Industries::class, inversedBy="addresses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $industry;

    /**
     * @ORM\ManyToOne(targetEntity=Kebele::class, inversedBy="addresses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kebele;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="addresses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $houseNo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phoneNo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndustry(): ?Industries
    {
        return $this->industry;
    }

    public function setIndustry(?Industries $industry): self
    {
        $this->industry = $industry;

        return $this;
    }

    public function getKebele(): ?Kebele
    {
        return $this->kebele;
    }

    public function setKebele(?Kebele $kebele): self
    {
        $this->kebele = $kebele;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getHouseNo(): ?string
    {
        return $this->houseNo;
    }

    public function setHouseNo(?string $houseNo): self
    {
        $this->houseNo = $houseNo;

        return $this;
    }

    public function getPhoneNo(): ?string
    {
        return $this->phoneNo;
    }

    public function setPhoneNo(?string $phoneNo): self
    {
        $this->phoneNo = $phoneNo;

        return $this;
    }
}
