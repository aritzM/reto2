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

    /**
     * @return int
     */
    public function getIdInstrumentos()
    {
        return $this->idInstrumentos;
    }

    /**
     * @param int $idInstrumentos
     */
    public function setIdInstrumentos($idInstrumentos)
    {
        $this->idInstrumentos = $idInstrumentos;
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
    public function getTamaño()
    {
        return $this->tamaño;
    }

    /**
     * @param string $tamaño
     */
    public function setTamaño($tamaño)
    {
        $this->tamaño = $tamaño;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param string $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }


}
