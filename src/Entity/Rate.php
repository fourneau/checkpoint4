<?php

namespace App\Entity;

use App\Repository\RateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RateRepository::class)
 */
class Rate
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
    private $rate_subscription;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $hourly_rate;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $VAT_rate;

    /**
     * @ORM\OneToMany(targetEntity=BillingMethod::class, mappedBy="rate")
     */
    private $billingMethods;

    public function __construct()
    {
        $this->billingMethods = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRateSubscription(): ?string
    {
        return $this->rate_subscription;
    }

    public function setRateSubscription(string $rate_subscription): self
    {
        $this->rate_subscription = $rate_subscription;

        return $this;
    }

    public function getHourlyRate(): ?string
    {
        return $this->hourly_rate;
    }

    public function setHourlyRate(string $hourly_rate): self
    {
        $this->hourly_rate = $hourly_rate;

        return $this;
    }

    public function getVATRate(): ?string
    {
        return $this->VAT_rate;
    }

    public function setVATRate(string $VAT_rate): self
    {
        $this->VAT_rate = $VAT_rate;

        return $this;
    }

    /**
     * @return Collection|BillingMethod[]
     */
    public function getBillingMethods(): Collection
    {
        return $this->billingMethods;
    }

    public function addBillingMethod(BillingMethod $billingMethod): self
    {
        if (!$this->billingMethods->contains($billingMethod)) {
            $this->billingMethods[] = $billingMethod;
            $billingMethod->setRate($this);
        }

        return $this;
    }

    public function removeBillingMethod(BillingMethod $billingMethod): self
    {
        if ($this->billingMethods->removeElement($billingMethod)) {
            // set the owning side to null (unless already changed)
            if ($billingMethod->getRate() === $this) {
                $billingMethod->setRate(null);
            }
        }

        return $this;
    }
}
