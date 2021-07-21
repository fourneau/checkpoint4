<?php

namespace App\Entity;

use App\Repository\BillingMethodRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BillingMethodRepository::class)
 */
class BillingMethod
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
    private $subscription;

    /**
     * @ORM\Column(type="boolean")
     */
    private $time_spent;

    /**
     * @ORM\ManyToOne(targetEntity=Rate::class, inversedBy="billingMethods")
     * @ORM\JoinColumn(nullable=true)
     */
    private $rate;

    /**
     * @ORM\ManyToOne(targetEntity=Bill::class, inversedBy="billingMethods")
     * @ORM\JoinColumn(nullable=true)
     */
    private $bill;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubscription(): ?bool
    {
        return $this->subscription;
    }

    public function setSubscription(bool $subscription): self
    {
        $this->subscription = $subscription;

        return $this;
    }

    public function getTimeSpent(): ?bool
    {
        return $this->time_spent;
    }

    public function setTimeSpent(bool $time_spent): self
    {
        $this->time_spent = $time_spent;

        return $this;
    }

    public function getRate(): ?Rate
    {
        return $this->rate;
    }

    public function setRate(?Rate $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getBill(): ?Bill
    {
        return $this->bill;
    }

    public function setBill(?Bill $bill): self
    {
        $this->bill = $bill;

        return $this;
    }

    public function __toString(): string
    {
        return sprintf('%s, %s', $this->time_spent, $this->subscription);
    }
}
