<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonnelTerrain
 *
 * @ORM\Table(name="personnel_terrain", indexes={@ORM\Index(name="idTerrain", columns={"idTerrain"})})
 * @ORM\Entity
 */
class PersonnelTerrain
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPersonnel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpersonnel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255, nullable=false)
     */
    private $poste;

    /**
     * @var int
     *
     * @ORM\Column(name="idTerrain", type="integer", nullable=false)
     */
    private $idterrain;


}
