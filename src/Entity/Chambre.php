<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChambreRepository::class)
 */
class Chambre
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
    private $num_chambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_batiment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_chambre;

    /**
     * @ORM\ManyToOne(targetEntity=Etudiant::class, inversedBy="etudiant")
     */
    private $etudiant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumChambre(): ?string
    {
        return $this->num_chambre;
    }

    public function setNumChambre(string $num_chambre): self
    {
        $this->num_chambre = $num_chambre;

        return $this;
    }

    public function getNumBatiment(): ?int
    {
        return $this->num_batiment;
    }

    public function setNumBatiment(int $num_batiment): self
    {
        $this->num_batiment = $num_batiment;

        return $this;
    }

    public function getTypeChambre(): ?string
    {
        return $this->type_chambre;
    }

    public function setTypeChambre(string $type_chambre): self
    {
        $this->type_chambre = $type_chambre;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }
}
