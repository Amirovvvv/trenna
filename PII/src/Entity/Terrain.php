<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Terrain
 *
 * @ORM\Table(name="terrain")
 * @ORM\Entity
 */
class Terrain
{
    /**
     * @var int
     *
     * @ORM\Column(name="idTerrain", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idterrain;

    /**
     * @var string
     *
     * @ORM\Column(name="typeTerrain", type="string", length=255, nullable=false)
     */
    private $typeterrain;

    /**
     * @return int
     */
    public function getIdterrain(): int
    {
        return $this->idterrain;
    }

    /**
     * @param int $idterrain
     */
    public function setIdterrain(int $idterrain): void
    {
        $this->idterrain = $idterrain;
    }

    /**
     * @return string
     */
    public function getTypeterrain(): ?string
    {
        return $this->typeterrain;
    }

    /**
     * @param string $typeterrain
     */
    public function setTypeterrain(string $typeterrain): void
    {
        $this->typeterrain = $typeterrain;
    }


}
