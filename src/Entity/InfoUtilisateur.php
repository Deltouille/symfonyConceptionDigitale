<?php

namespace App\Entity;

use App\Repository\InfoUtilisateurRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InfoUtilisateurRepository::class)
 */
class InfoUtilisateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=13)
     * @Assert\Regex(
     *      pattern="^([1-3])[\s\.\-]?([0-9]{2})[\s\.\-]?(0[0-9]|[2-35-9][0-9]|[14][0-2])[\s\.\-]?(0[1-9]|[1-8][0-9]|9[0-57-9]|2[ab])[\s\.\-]?(00[1-9]|0[1-9][0-9]|[1-8][0-9]{2}|9[0-8][0-9]|990)[\s\.\-]?([0-9]{3})[\s\.\-]?([0-8][0-9]|9[0-7])$/gi^",
     *      match=false,
     *      message="numéro de sécurité sociale non valide"
     * )
     */
    private $numeroSecuriteSociale;

    /**
     * @ORM\Column(type="boolean")
     */
    private $veuxVaccin;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumeroSecuriteSociale(): ?string
    {
        return $this->numeroSecuriteSociale;
    }

    public function setNumeroSecuriteSociale(string $numeroSecuriteSociale): self
    {
        $this->numeroSecuriteSociale = $numeroSecuriteSociale;

        return $this;
    }

    public function getVeuxVaccin(): ?bool
    {
        return $this->veuxVaccin;
    }

    public function setVeuxVaccin(bool $veuxVaccin): self
    {
        $this->veuxVaccin = $veuxVaccin;

        return $this;
    }
}
