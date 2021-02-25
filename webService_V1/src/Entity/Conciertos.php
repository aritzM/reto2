<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conciertos
 *
 * @ORM\Table(name="conciertos")
 * @ORM\Entity
 */
class Conciertos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_Evento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=55, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=55, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=55, nullable=false)
     */
    private $ubicacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEvento", type="date", nullable=false)
     */
    private $fechaevento;


}
