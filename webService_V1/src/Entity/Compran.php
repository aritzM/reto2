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
     * @var int
     *
     * @ORM\Column(name="unidades", type="integer", nullable=false)
     */
    private $unidades;

    /**
     * @return int
     */
    public function getIdCompra()
    {
        return $this->idCompra;
    }

    /**
     * @param int $idCompra
     */
    public function setIdCompra($idCompra)
    {
        $this->idCompra = $idCompra;
    }

    /**
     * @return int
     */
    public function getIdInstrumento()
    {
        return $this->idInstrumento;
    }

    /**
     * @param int $idInstrumento
     */
    public function setIdInstrumento($idInstrumento)
    {
        $this->idInstrumento = $idInstrumento;
    }

    /**
     * @return int
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param int $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param \DateTime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return int
     */
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * @param int $unidades
     */
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;
    }


}
