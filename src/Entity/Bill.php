<?php

namespace App\Entity;

use App\Repository\BillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BillRepository::class)
 */
class Bill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $invoicePdf;

    /**
     * @ORM\ManyToOne(targetEntity=BillStatus::class, inversedBy="bills")
     */
    private $status;


    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }


    public function getInvoicePdf(): ?string
    {
        return $this->invoicePdf;
    }

    public function setInvoicePdf(?string $invoicePdf): self
    {
        $this->invoicePdf = $invoicePdf;

        return $this;
    }

    public function getStatus(): ?BillStatus
    {
        return $this->status;
    }

    public function setStatus(?BillStatus $status): self
    {
        $this->status = $status;

        return $this;
    }
}