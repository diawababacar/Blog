<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
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
    private $AuteurCommentaire;

    /**
     * @ORM\Column(type="text")
     */
    private $ContenuCommentaire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DatePubCommentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ArticleCommentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteurCommentaire(): ?string
    {
        return $this->AuteurCommentaire;
    }

    public function setAuteurCommentaire(string $AuteurCommentaire): self
    {
        $this->AuteurCommentaire = $AuteurCommentaire;

        return $this;
    }

    public function getContenuCommentaire(): ?string
    {
        return $this->ContenuCommentaire;
    }

    public function setContenuCommentaire(string $ContenuCommentaire): self
    {
        $this->ContenuCommentaire = $ContenuCommentaire;

        return $this;
    }

    public function getDatePubCommentaire(): ?\DateTimeInterface
    {
        return $this->DatePubCommentaire;
    }

    public function setDatePubCommentaire(\DateTimeInterface $DatePubCommentaire): self
    {
        $this->DatePubCommentaire = $DatePubCommentaire;

        return $this;
    }

    public function getArticleCommentaire(): ?Article
    {
        return $this->ArticleCommentaire;
    }

    public function setArticleCommentaire(?Article $ArticleCommentaire): self
    {
        $this->ArticleCommentaire = $ArticleCommentaire;

        return $this;
    }
}
