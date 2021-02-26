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
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * @param string $ubicacion
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

    /**
     * @return \DateTime
     */
    public function getFechaevento()
    {
        return $this->fechaevento;
    }

    /**
     * @param \DateTime $fechaevento
     */
    public function setFechaevento($fechaevento)
    {
        $this->fechaevento = $fechaevento;
    }


}
