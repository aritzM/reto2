<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tema
 *
 * @ORM\Table(name="tema")
 * @ORM\Entity
 */
class Tema
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tema", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTema;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=55, nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCreacion", type="date", nullable=false)
     */
    private $fechacreacion;


}
