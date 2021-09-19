<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(name="idE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ide;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     * * @Assert\NotBlank(message="le nom de l'mploye ne doit pas étre vide")
     *  @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "Le nom correct doit comporter au minimum {{ limit }} characters",
     *      maxMessage = "Le nom correct ne doit pas depasser {{ limit }} characters",
     *      allowEmptyString = false
     *     )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     * * @Assert\NotBlank(message="le prenom de l'employe ne doit pas étre vide")
     *  @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "Le prenom correct doit comporter au minimum {{ limit }} characters",
     *      maxMessage = "Le prenom correct ne doit pas depasser {{ limit }} characters",
     *      allowEmptyString = false
     *     )
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     *  * @Assert\NotBlank(message="le numero de l'employe ne doit pas étre vide")
     *  @Assert\Length(
     *      value=8,
     *     exactMessage="le numero de telephone doit avoir exactement 8 chiffres ",
     *      allowEmptyString = false
     *     )
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255, nullable=false)
     *  @Assert\NotBlank(message="le poste du client ne doit pas étre vide")
     *  @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "Le poste correct doit comporter au minimum {{ limit }} characters",
     *      maxMessage = "Le poste correct ne doit pas depasser {{ limit }} characters",
     *      allowEmptyString = false
     *     )
     */
    private $poste;

    public function getIde(): ?int
    {
        return $this->ide;
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

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }


}
