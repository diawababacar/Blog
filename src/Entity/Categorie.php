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
    private $TitreCategorie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $DescriptionCategorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="categorie")
     */
    private $Articles;

    public function __construct()
    {
        $this->Articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreCategorie(): ?string
    {
        return $this->TitreCategorie;
    }

    public function setTitreCategorie(string $TitreCategorie): self
    {
        $this->TitreCategorie = $TitreCategorie;

        return $this;
    }

    public function getDescriptionCategorie(): ?string
    {
        return $this->DescriptionCategorie;
    }

    public function setDescriptionCategorie(?string $DescriptionCategorie): self
    {
        $this->DescriptionCategorie = $DescriptionCategorie;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->Articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->Articles->contains($article)) {
            $this->Articles[] = $article;
            $article->setCategorie($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->Articles->contains($article)) {
            $this->Articles->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getCategorie() === $this) {
                $article->setCategorie(null);
            }
        }

        return $this;
    }
}
