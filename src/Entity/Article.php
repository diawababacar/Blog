<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10,max=255,minMessage="Votre titre doit contenir au moins 10 caractéres")
     */
    private $TitreArticle;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=10,minMessage="Le contenu de l'article doit au moins avoir 40 caractéres")
     */
    private $ContenuArticle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DatePubArticle;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url()
     */
    private $ImageArticle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="Articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="ArticleCommentaire", orphanRemoval=true)
     */
    private $commentaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreArticle(): ?string
    {
        return $this->TitreArticle;
    }

    public function setTitreArticle(string $TitreArticle): self
    {
        $this->TitreArticle = $TitreArticle;

        return $this;
    }

    public function getContenuArticle(): ?string
    {
        return $this->ContenuArticle;
    }

    public function setContenuArticle(string $ContenuArticle): self
    {
        $this->ContenuArticle = $ContenuArticle;

        return $this;
    }

    public function getDatePubArticle(): ?\DateTimeInterface
    {
        return $this->DatePubArticle;
    }

    public function setDatePubArticle(\DateTimeInterface $DatePubArticle): self
    {
        $this->DatePubArticle = $DatePubArticle;

        return $this;
    }

    public function getImageArticle(): ?string
    {
        return $this->ImageArticle;
    }

    public function setImageArticle(string $ImageArticle): self
    {
        $this->ImageArticle = $ImageArticle;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setArticleCommentaire($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getArticleCommentaire() === $this) {
                $commentaire->setArticleCommentaire(null);
            }
        }

        return $this;
    }
}
