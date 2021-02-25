<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organizan
 *
 * @ORM\Table(name="organizan")
 * @ORM\Entity
 */
class Organizan
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_organiza", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrganiza;

    /**
     * @var int
     *
     * @ORM\Column(name="id_concierto", type="integer", nullable=false)
     */
    private $idConcierto;

    /**
     * @var int
     *
     * @ORM\Column(name="id_trabajador", type="integer", nullable=false)
     */
    private $idTrabajador;


}
