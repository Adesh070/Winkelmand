<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="catid")
     */
    private $cat_id;

    public function __construct()
    {
        $this->cat_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getCatId(): Collection
    {
        return $this->cat_id;
    }

    public function addCatId(Product $catId): self
    {
        if (!$this->cat_id->contains($catId)) {
            $this->cat_id[] = $catId;
            $catId->setCatid($this);
        }

        return $this;
    }

    public function removeCatId(Product $catId): self
    {
        if ($this->cat_id->contains($catId)) {
            $this->cat_id->removeElement($catId);
            // set the owning side to null (unless already changed)
            if ($catId->getCatid() === $this) {
                $catId->setCatid(null);
            }
        }

        return $this;
    }
    public function __ToString() {
        return (string) $this->getNaam();
    }
}
