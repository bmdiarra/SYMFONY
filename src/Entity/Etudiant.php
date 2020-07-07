<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
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
    private $matricule_etu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_etu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_etu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_etu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone_etu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_etu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $datenaiss_etu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $loger;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type_bourse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_etu;

    /**
     * @ORM\OneToMany(targetEntity=Chambre::class, mappedBy="etudiant")
     */
    private $etudiant;

    public function __construct()
    {
        $this->etudiant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatriculeEtu(): ?string
    {
        return $this->matricule_etu;
    }

    public function setMatriculeEtu(string $matricule_etu): self
    {
        $this->matricule_etu = $matricule_etu;

        return $this;
    }

    public function getNomEtu(): ?string
    {
        return $this->nom_etu;
    }

    public function setNomEtu(string $nom_etu): self
    {
        $this->nom_etu = $nom_etu;

        return $this;
    }

    public function getPrenomEtu(): ?string
    {
        return $this->prenom_etu;
    }

    public function setPrenomEtu(string $prenom_etu): self
    {
        $this->prenom_etu = $prenom_etu;

        return $this;
    }

    public function getEmailEtu(): ?string
    {
        return $this->email_etu;
    }

    public function setEmailEtu(string $email_etu): self
    {
        $this->email_etu = $email_etu;

        return $this;
    }

    public function getTelephoneEtu(): ?string
    {
        return $this->telephone_etu;
    }

    public function setTelephoneEtu(string $telephone_etu): self
    {
        $this->telephone_etu = $telephone_etu;

        return $this;
    }

    public function getTypeEtu(): ?string
    {
        return $this->type_etu;
    }

    public function setTypeEtu(string $type_etu): self
    {
        $this->type_etu = $type_etu;

        return $this;
    }

    public function getDatenaissEtu(): ?string
    {
        return $this->datenaiss_etu;
    }

    public function setDatenaissEtu(?string $datenaiss_etu): self
    {
        $this->datenaiss_etu = $datenaiss_etu;

        return $this;
    }

    public function getLoger(): ?string
    {
        return $this->loger;
    }

    public function setLoger(?string $loger): self
    {
        $this->loger = $loger;

        return $this;
    }

    public function getTypeBourse(): ?string
    {
        return $this->type_bourse;
    }

    public function setTypeBourse(?string $type_bourse): self
    {
        $this->type_bourse = $type_bourse;

        return $this;
    }

    public function getAdresseEtu(): ?string
    {
        return $this->adresse_etu;
    }

    public function setAdresseEtu(?string $adresse_etu): self
    {
        $this->adresse_etu = $adresse_etu;

        return $this;
    }

    /**
     * @return Collection|Chambre[]
     */
    public function getEtudiant(): Collection
    {
        return $this->etudiant;
    }

    public function addEtudiant(Chambre $etudiant): self
    {
        if (!$this->etudiant->contains($etudiant)) {
            $this->etudiant[] = $etudiant;
            $etudiant->setEtudiant($this);
        }

        return $this;
    }

    public function removeEtudiant(Chambre $etudiant): self
    {
        if ($this->etudiant->contains($etudiant)) {
            $this->etudiant->removeElement($etudiant);
            // set the owning side to null (unless already changed)
            if ($etudiant->getEtudiant() === $this) {
                $etudiant->setEtudiant(null);
            }
        }

        return $this;
    }
}
