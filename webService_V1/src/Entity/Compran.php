<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compran
 *
 * @ORM\Table(name="compran")
 * @ORM\Entity
 */
class Compran
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_compra", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCompra;

    /**
     * @var int
     *
     * @ORM\Column(name="id_instrumento", type="integer", nullable=false)
     */
    private $idInstrumento;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cliente", type="integer", nullable=false)
     */
    private $idCliente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time", nullable=false)
     */
    private $hora;

    /**
     * @var int
     *
     * @ORM\Column(name="unidades", type="integer", nullable=false)
     */
    private $unidades;


}
