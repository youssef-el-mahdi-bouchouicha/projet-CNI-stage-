<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande")
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
     * @var int
     *
     * @ORM\Column(name="idC", type="integer", nullable=false)
     */
    private $idc;

    /**
     * @var int
     *
     * @ORM\Column(name="idE", type="integer", nullable=false)
     */
    private $ide;

    /**
     * @var int
     *
     * @ORM\Column(name="idAPP", type="integer", nullable=false)
     */
    private $idapp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDemande", type="date", nullable=false)
     */
    private $datedemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="RDVdepo", type="date", nullable=false)
     */
    private $rdvdepo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="RDVrec", type="date", nullable=false)
     */
    private $rdvrec;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMachine", type="string", length=255, nullable=false)
     */
    private $nommachine;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="string", length=255, nullable=false)
     */
    private $remarque;

    public function getIdd(): ?int
    {
        return $this->idd;
    }

    public function getIdc(): ?int
    {
        return $this->idc;
    }

    public function setIdc(int $idc): self
    {
        $this->idc = $idc;

        return $this;
    }

    public function getIde(): ?int
    {
        return $this->ide;
    }

    public function setIde(int $ide): self
    {
        $this->ide = $ide;

        return $this;
    }

    public function getIdapp(): ?int
    {
        return $this->idapp;
    }

    public function setIdapp(int $idapp): self
    {
        $this->idapp = $idapp;

        return $this;
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


}
