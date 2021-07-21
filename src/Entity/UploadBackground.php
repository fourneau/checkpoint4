<?php

namespace App\Entity;

use App\Repository\UploadBackgroundRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Self_;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;




/**
 * @ORM\Entity(repositoryClass=UploadBackgroundRepository::class)
 * @Vich\Uploadable
 */
class UploadBackground
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
    private $upload;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="upload")
     * @var File
     */
    private $imageUpload;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUpload(): ?string
    {
        return $this->upload;
    }

    public function setUpload(?string $upload): self
    {
        $this->upload = $upload;

        return $this;
    }

    public function setImageUpload(File $upload = null)
    {
        $this->imageUpload = $upload;
        if ($upload) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageUpload()
    {
        return $this->imageUpload;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}
