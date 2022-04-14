<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Match
 *
 * @ORM\Table(name="match", indexes={@ORM\Index(name="idArb", columns={"idArb"})})
 * @ORM\Entity
 */
class Match
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMatchh", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmatchh;

    /**
     * @var string
     *
     * @ORM\Column(name="typeMatchh", type="string", length=255, nullable=false)
     */
    private $typematchh;

    /**
     * @var string
     *
     * @ORM\Column(name="dateMatchh", type="string", length=30, nullable=false)
     */
    private $datematchh;

    /**
     * @var int
     *
     * @ORM\Column(name="idArb", type="integer", nullable=false)
     */
    private $idarb;

    /**
     * @return int
     */
    public function getIdmatchh(): ?int
    {
        return $this->idmatchh;
    }

    /**
     * @param int $idmatchh
     */
    public function setIdmatchh(int $idmatchh): void
    {
        $this->idmatchh = $idmatchh;
    }

    /**
     * @return string
     */
    public function getTypematchh(): ?string
    {
        return $this->typematchh;
    }

    /**
     * @param string $typematchh
     */
    public function setTypematchh(string $typematchh): void
    {
        $this->typematchh = $typematchh;
    }

    /**
     * @return string
     */
    public function getDatematchh(): ?string
    {
        return $this->datematchh;
    }

    /**
     * @param string $datematchh
     */
    public function setDatematchh(string $datematchh): void
    {
        $this->datematchh = $datematchh;
    }

    /**
     * @return int
     */
    public function getIdarb(): ?int
    {
        return $this->idarb;
    }

    /**
     * @param int $idarb
     */
    public function setIdarb(int $idarb): void
    {
        $this->idarb = $idarb;
    }


}
