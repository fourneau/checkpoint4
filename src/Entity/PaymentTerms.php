<?php

namespace App\Entity;

use App\Repository\PaymentTermsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentTermsRepository::class)
 */
class PaymentTerms
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
    private $ribNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $IBAN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BIC;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domiciliation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modalites;

    /**
     * @ORM\Column(type="text")
     */
    private $lawrecall;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRibNumber(): ?string
    {
        return $this->ribNumber;
    }

    public function setRibNumber(string $ribNumber): self
    {
        $this->ribNumber = $ribNumber;

        return $this;
    }

    public function getIBAN(): ?string
    {
        return $this->IBAN;
    }

    public function setIBAN(string $IBAN): self
    {
        $this->IBAN = $IBAN;

        return $this;
    }

    public function getBIC(): ?string
    {
        return $this->BIC;
    }

    public function setBIC(string $BIC): self
    {
        $this->BIC = $BIC;

        return $this;
    }

    public function getDomiciliation(): ?string
    {
        return $this->domiciliation;
    }

    public function setDomiciliation(string $domiciliation): self
    {
        $this->domiciliation = $domiciliation;

        return $this;
    }

    public function getModalites(): ?string
    {
        return $this->modalites;
    }

    public function setModalites(string $modalites): self
    {
        $this->modalites = $modalites;

        return $this;
    }

    public function getLawrecall(): ?string
    {
        return $this->lawrecall;
    }

    public function setLawrecall(string $lawrecall): self
    {
        $this->lawrecall = $lawrecall;

        return $this;
    }
}
