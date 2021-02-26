<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asisten
 *
 * @ORM\Table(name="asisten")
 * @ORM\Entity
 */
class Asisten
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_asistencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAsistencia;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cliente", type="integer", nullable=false)
     */
    private $idCliente;

    /**
     * @var int
     *
     * @ORM\Column(name="id_Evento", type="integer", nullable=false)
     */
    private $idEvento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @return int
     */
    public function getIdAsistencia()
    {
        return $this->idAsistencia;
    }

    /**
     * @param int $idAsistencia
     */
    public function setIdAsistencia($idAsistencia)
    {
        $this->idAsistencia = $idAsistencia;
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
     * @return int
     */
    public function getIdEvento()
    {
        return $this->idEvento;
    }

    /**
     * @param int $idEvento
     */
    public function setIdEvento($idEvento)
    {
        $this->idEvento = $idEvento;
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


}
