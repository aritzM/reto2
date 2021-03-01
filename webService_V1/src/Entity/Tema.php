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

    /**
     * @return int
     */
    public function getIdTema()
    {
        return $this->idTema;
    }

    /**
     * @param int $idTema
     */
    public function setIdTema($idTema)
    {
        $this->idTema = $idTema;
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
     * @return \DateTime
     */
    public function getFechacreacion()
    {
        return $this->fechacreacion;
    }

    /**
     * @param \DateTime $fechacreacion
     */
    public function setFechacreacion($fechacreacion)
    {
        $this->fechacreacion = $fechacreacion;
    }


}
