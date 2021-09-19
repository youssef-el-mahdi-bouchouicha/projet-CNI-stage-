<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="fk_emp", columns={"idE"}), @ORM\Index(name="fk_client", columns={"idC"}), @ORM\Index(name="fk_app", columns={"idAPP"})})
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idD", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDemande", type="date", nullable=false)
     */
    private $datedemande;

    public function __construct()
    {
        $this->datedemande = new \DateTime('now');


    }

    /**
     * @var \DateTime
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="RDVdepo", type="date", nullable=false)
     */
    private $rdvdepo;

    /**
     * @var \DateTime
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="RDVrec", type="date", nullable=true)
     */
    private $rdvrec;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMachine", type="string", length=255, nullable=false)
     * * @Assert\NotBlank(message="le nom de la machine ne doit pas étre vide")
     *  @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "Le nom correct doit comporter au minimum {{ limit }} characters",
     *      maxMessage = "Le nom correct ne doit pas depasser {{ limit }} characters",
     *      allowEmptyString = false
     *     )
     */
    private $nommachine;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="string", length=255, nullable=false)
     * * @Assert\NotBlank(message="la remarque ne doit pas étre vide")
     *  @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "la remarque correct doit comporter au minimum {{ limit }} characters",
     *      maxMessage = "la remarque correct ne doit pas depasser {{ limit }} characters",
     *      allowEmptyString = false
     *     )
     */
    private $remarque;

    /**
     * @var \Application
     *
     * @ORM\ManyToOne(targetEntity="Application")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAPP", referencedColumnName="idAPP")
     * })
     */
    private $idapp;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idC", referencedColumnName="idC")
     * })
     */
    private $idc;

    /**
     * @var \Employee
     *
     * @ORM\ManyToOne(targetEntity="Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idE", referencedColumnName="idE")
     * })
     */
    private $ide;

    public function getIdd(): ?int
    {
        return $this->idd;
    }

    public function getDatedemande(): ?\DateTimeInterface
    {
        return $this->datedemande;
    }

    public function setDatedemande(\DateTimeInterface $datedemande): self
    {
        $this->datedemande = $datedemande;

        return $this;
    }

    public function getRdvdepo(): ?\DateTimeInterface
    {
        return $this->rdvdepo;
    }

    public function setRdvdepo(\DateTimeInterface $rdvdepo): self
    {
        $this->rdvdepo = $rdvdepo;

        return $this;
    }

    public function getRdvrec(): ?\DateTimeInterface
    {
        return $this->rdvrec;
    }

    public function setRdvrec(\DateTimeInterface $rdvrec): self
    {
        $this->rdvrec = $rdvrec;

        return $this;
    }

    public function getNommachine(): ?string
    {
        return $this->nommachine;
    }

    public function setNommachine(string $nommachine): self
    {
        $this->nommachine = $nommachine;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(string $remarque): self
    {
        $this->remarque = $remarque;

        return $this;
    }

    public function getIdapp(): ?Application
    {
        return $this->idapp;
    }

    public function setIdapp(?Application $idapp): self
    {
        $this->idapp = $idapp;

        return $this;
    }

    public function getIdc(): ?Client
    {
        return $this->idc;
    }

    public function setIdc(?Client $idc): self
    {
        $this->idc = $idc;

        return $this;
    }

    public function getIde(): ?Employee
    {
        return $this->ide;
    }

    public function setIde(?Employee $ide): self
    {
        $this->ide = $ide;

        return $this;
    }


}
