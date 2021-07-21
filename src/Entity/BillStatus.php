<?php

namespace App\Entity;

use App\Repository\BillStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BillStatusRepository::class)
 */
class BillStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $payed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $unpayed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $in_progress;

    /**
     * @ORM\OneToMany(targetEntity=Bill::class, mappedBy="status")
     */
    private $bills;

    public function __construct()
    {
        $this->bills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayed(): ?bool
    {
        return $this->payed;
    }

    public function setPayed(bool $payed): self
    {
        $this->payed = $payed;

        return $this;
    }

    public function getUnpayed(): ?bool
    {
        return $this->unpayed;
    }

    public function setUnpayed(bool $unpayed): self
    {
        $this->unpayed = $unpayed;

        return $this;
    }

    public function getInProgress(): ?bool
    {
        return $this->in_progress;
    }

    public function setInProgress(bool $in_progress): self
    {
        $this->in_progress = $in_progress;

        return $this;
    }



    /**
     * @return Collection|Bill[]
     */
    public function getBills(): Collection
    {
        return $this->bills;
    }

    public function addBill(Bill $bill): self
    {
        if (!$this->bills->contains($bill)) {
            $this->bills[] = $bill;
            $bill->setStatus($this);
        }

        return $this;
    }

    public function removeBill(Bill $bill): self
    {
        if ($this->bills->removeElement($bill)) {
            // set the owning side to null (unless already changed)
            if ($bill->getStatus() === $this) {
                $bill->setStatus(null);
            }
        }

        return $this;
    }
}
