<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Foot
 *
 * @ORM\Table(name="foot", indexes={@ORM\Index(name="idArb", columns={"idArb"})})
 * @ORM\Entity
 */
class Foot
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
     *@Assert\NotBlank(message="Le type de match doit etre non vide")
     *@Assert\Length(
     * min = 4,
     * max = 15,
     * minMessage="L'email doit etre >=4",
     * maxMessage="L'email doit etre <=15"
     *   )
     * @var string
     *
     * @ORM\Column(name="typeMatchh", type="string", length=255, nullable=false)
     */
    private $typematchh;

    /**
     *@Assert\NotBlank(message="La date doit etre non vide")
     *@Assert\Length(
     * min = 10,
     * max = 10,
     * minMessage="La date est incorrecte",
     * maxMessage="La date est incorrecte yyyy-mm-dd"
     *   )
     * @var string
     *
     * @ORM\Column(name="dateMatchh", type="string", length=30, nullable=false)
     */
    private $datematchh;

    /**
     *@Assert\NotBlank(message="L'id doit etre non vide")
     * @var int
     *
     * @ORM\Column(name="idArb", type="integer", nullable=false)
     */
    private $idarb;

    /**
     * @return int
     */
    public function getIdmatchh(): int
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
