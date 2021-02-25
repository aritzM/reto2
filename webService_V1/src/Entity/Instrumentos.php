<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Instrumentos
 *
 * @ORM\Table(name="instrumentos")
 * @ORM\Entity
 */
class Instrumentos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_instrumentos", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idInstrumentos;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=55, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="tamaño", type="string", length=55, nullable=false)
     */
    private $tamaño;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=55, nullable=false)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $precio;


}
