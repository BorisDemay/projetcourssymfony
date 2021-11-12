<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 */
class Personne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="idPersonne")
     */
    private $locations;

    public function __construct()
    {
        $this->idSalle = new ArrayCollection();
        $this->locations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getIdSalle(): Collection
    {
        return $this->idSalle;
    }

    public function addIdSalle(Location $idSalle): self
    {
        if (!$this->idSalle->contains($idSalle)) {
            $this->idSalle[] = $idSalle;
            $idSalle->setIdPersonne($this);
        }

        return $this;
    }

    public function removeIdSalle(Location $idSalle): self
    {
        if ($this->idSalle->removeElement($idSalle)) {
            // set the owning side to null (unless already changed)
            if ($idSalle->getIdPersonne() === $this) {
                $idSalle->setIdPersonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setIdPersonne($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getIdPersonne() === $this) {
                $location->setIdPersonne(null);
            }
        }

        return $this;
    }
}
