<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity
 */
class Application
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAPP", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idapp;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     * * * @Assert\NotBlank(message="le nom de l'application ne doit pas étre vide")
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
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     *  * @Assert\NotBlank(message="la description de l'application ne doit pas étre vide")
     *  @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "Le description correct doit comporter au minimum {{ limit }} characters",
     *      maxMessage = "Le description correct ne doit pas depasser {{ limit }} characters",
     *      allowEmptyString = false
     *     )
     */
    private $description;

    public function getIdapp(): ?int
    {
        return $this->idapp;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
