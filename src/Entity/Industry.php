<?php

namespace App\Entity;

use App\Repository\IndustryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IndustryRepository::class)
 */
class Industry
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
     * @ORM\Column(type="string", length=255)
     */
    private $kebele;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $houseNo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phoneNo;

    /**
     * @ORM\Column(type="integer")
     */
    private $rYear;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Icatagory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $IWorkType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $IorganizedType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tinNo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SCapitalAmount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SCapitalSource;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CCapitalCash;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CCapitalAsset;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $progressLevel;

    /**
     * @ORM\Column(type="integer")
     */
    private $IMemberMale;

    /**
     * @ORM\Column(type="integer")
     */
    private $IMemberFemale;

    /**
     * @ORM\Column(type="integer")
     */
    private $IMember16To29;

    /**
     * @ORM\Column(type="integer")
     */
    private $IMemberAbove29;


    /**
     * @ORM\Column(type="integer")
     */
    private $IDisabledMemberMale;

    /**
     * @ORM\Column(type="integer")
     */
    private $IDisabledMemberFemale;

    /**
     * @ORM\Column(type="integer")
     */
    private $BEmployeeMale;

    /**
     * @ORM\Column(type="integer")
     */
    private $BEmployeeFemale;

    /**
     * @ORM\Column(type="integer")
     */
    private $BFixedTermMale;

    /**
     * @ORM\Column(type="integer")
     */
    private $BFixedTermFemale;

    /**
     * @ORM\Column(type="integer")
     */
    private $BContratMale;

    /**
     * @ORM\Column(type="integer")
     */
    private $BContratFemale;

    /**
     * @ORM\Column(type="integer")
     */
    private $CEmployeeMale;

    /**
     * @ORM\Column(type="integer")
     */
    private $CEmployeeFemale;

    /**
     * @ORM\Column(type="integer")
     */
    private $CFixedTermMale;

    /**
     * @ORM\Column(type="integer")
     */
    private $CFixedTermFemale;

    /**
     * @ORM\Column(type="integer")
     */
    private $CContratMale;

    /**
     * @ORM\Column(type="integer")
     */
    private $CContratFemale;



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

    public function getKebele(): ?string
    {
        return $this->kebele;
    }

    public function setKebele(string $kebele): self
    {
        $this->kebele = $kebele;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getHouseNo(): ?string
    {
        return $this->houseNo;
    }

    public function setHouseNo(string $houseNo): self
    {
        $this->houseNo = $houseNo;

        return $this;
    }

    public function getPhoneNo(): ?string
    {
        return $this->phoneNo;
    }

    public function setPhoneNo(string $phoneNo): self
    {
        $this->phoneNo = $phoneNo;

        return $this;
    }

    public function getRYear(): ?int
    {
        return $this->rYear;
    }

    public function setRYear(int $rYear): self
    {
        $this->rYear = $rYear;

        return $this;
    }

    public function getIcatagory(): ?string
    {
        return $this->Icatagory;
    }

    public function setIcatagory(string $Icatagory): self
    {
        $this->Icatagory = $Icatagory;

        return $this;
    }

    public function getIWorkType(): ?string
    {
        return $this->IWorkType;
    }

    public function setIWorkType(string $IWorkType): self
    {
        $this->IWorkType = $IWorkType;

        return $this;
    }

    public function getIorganizedType(): ?string
    {
        return $this->IorganizedType;
    }

    public function setIorganizedType(string $IorganizedType): self
    {
        $this->IorganizedType = $IorganizedType;

        return $this;
    }

    public function getTinNo(): ?string
    {
        return $this->tinNo;
    }

    public function setTinNo(string $tinNo): self
    {
        $this->tinNo = $tinNo;

        return $this;
    }

    public function getSCapitalAmount(): ?string
    {
        return $this->SCapitalAmount;
    }

    public function setSCapitalAmount(string $SCapitalAmount): self
    {
        $this->SCapitalAmount = $SCapitalAmount;

        return $this;
    }

    public function getSCapitalSource(): ?string
    {
        return $this->SCapitalSource;
    }

    public function setSCapitalSource(string $SCapitalSource): self
    {
        $this->SCapitalSource = $SCapitalSource;

        return $this;
    }

    public function getCCapitalCash(): ?string
    {
        return $this->CCapitalCash;
    }

    public function setCCapitalCash(string $CCapitalCash): self
    {
        $this->CCapitalCash = $CCapitalCash;

        return $this;
    }

    public function getCCapitalAsset(): ?string
    {
        return $this->CCapitalAsset;
    }

    public function setCCapitalAsset(string $CCapitalAsset): self
    {
        $this->CCapitalAsset = $CCapitalAsset;

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

    public function getIMemberMale(): ?string
    {
        return $this->IMemberMale;
    }

    public function setIMemberMale(string $IMemberMale): self
    {
        $this->IMemberMale = $IMemberMale;

        return $this;
    }

    public function getIMemberFemale(): ?string
    {
        return $this->IMemberFemale;
    }

    public function setIMemberFemale(string $IMemberFemale): self
    {
        $this->IMemberFemale = $IMemberFemale;

        return $this;
    }

    public function getIDisabledMemberMale(): ?string
    {
        return $this->IDisabledMemberMale;
    }

    public function setIDisabledMemberMale(string $IDisabledMemberMale): self
    {
        $this->IDisabledMemberMale = $IDisabledMemberMale;

        return $this;
    }

    public function getIDisabledMemberFemale(): ?string
    {
        return $this->IDisabledMemberFemale;
    }

    public function setIDisabledMemberFemale(string $IDisabledMemberFemale): self
    {
        $this->IDisabledMemberFemale = $IDisabledMemberFemale;

        return $this;
    }

    public function getBEmployeeMale(): ?string
    {
        return $this->BEmployeeMale;
    }

    public function setBEmployeeMale(string $BEmployeeMale): self
    {
        $this->BEmployeeMale = $BEmployeeMale;

        return $this;
    }

    public function getBEmployeeFemale(): ?string
    {
        return $this->BEmployeeFemale;
    }

    public function setBEmployeeFemale(string $BEmployeeFemale): self
    {
        $this->BEmployeeFemale = $BEmployeeFemale;

        return $this;
    }

    public function getBFixedTermMale(): ?string
    {
        return $this->BFixedTermMale;
    }

    public function setBFixedTermMale(string $BFixedTermMale): self
    {
        $this->BFixedTermMale = $BFixedTermMale;

        return $this;
    }

    public function getBFixedTermFemale(): ?string
    {
        return $this->BFixedTermFemale;
    }

    public function setBFixedTermFemale(string $BFixedTermFemale): self
    {
        $this->BFixedTermFemale = $BFixedTermFemale;

        return $this;
    }

    public function getBContratMale(): ?string
    {
        return $this->BContratMale;
    }

    public function setBContratMale(string $BContratMale): self
    {
        $this->BContratMale = $BContratMale;

        return $this;
    }

    public function getBContratFemale(): ?string
    {
        return $this->BContratFemale;
    }

    public function setBContratFemale(string $BContratFemale): self
    {
        $this->BContratFemale = $BContratFemale;

        return $this;
    }

    public function getCEmployeeMale(): ?string
    {
        return $this->CEmployeeMale;
    }

    public function setCEmployeeMale(string $CEmployeeMale): self
    {
        $this->CEmployeeMale = $CEmployeeMale;

        return $this;
    }

    public function getCEmployeeFemale(): ?string
    {
        return $this->CEmployeeFemale;
    }

    public function setCEmployeeFemale(string $CEmployeeFemale): self
    {
        $this->CEmployeeFemale = $CEmployeeFemale;

        return $this;
    }

    public function getCFixedTermMale(): ?string
    {
        return $this->CFixedTermMale;
    }

    public function setCFixedTermMale(string $CFixedTermMale): self
    {
        $this->CFixedTermMale = $CFixedTermMale;

        return $this;
    }

    public function getCFixedTermFemale(): ?string
    {
        return $this->CFixedTermFemale;
    }

    public function setCFixedTermFemale(string $CFixedTermFemale): self
    {
        $this->CFixedTermFemale = $CFixedTermFemale;

        return $this;
    }

    public function getCContratMale(): ?string
    {
        return $this->CContratMale;
    }

    public function setCContratMale(string $CContratMale): self
    {
        $this->CContratMale = $CContratMale;

        return $this;
    }

    public function getCContratFemale(): ?string
    {
        return $this->CContratFemale;
    }

    public function setCContratFemale(string $CContratFemale): self
    {
        $this->CContratFemale = $CContratFemale;

        return $this;
    }

    public function getIMember16To29(): ?int
    {
        return $this->IMember16To29;
    }

    public function setIMember16To29(int $IMember16To29): self
    {
        $this->IMember16To29 = $IMember16To29;

        return $this;
    }

    public function getIMemberAbove29(): ?int
    {
        return $this->IMemberAbove29;
    }

    public function setIMemberAbove29(int $IMemberAbove29): self
    {
        $this->IMemberAbove29 = $IMemberAbove29;

        return $this;
    }
}
