<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maquetas
 *
 * @ORM\Table(name="maquetas")
 * @ORM\Entity
 */
class Maquetas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_maquetas", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMaquetas;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=55, nullable=false)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="id_artista", type="integer", nullable=false)
     */
    private $idArtista;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=55, nullable=false)
     */
    private $descripcion;

    /**
     * @return int
     */
    public function getIdMaquetas()
    {
        return $this->idMaquetas;
    }

    /**
     * @param int $idMaquetas
     */
    public function setIdMaquetas($idMaquetas)
    {
        $this->idMaquetas = $idMaquetas;
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
     * @return int
     */
    public function getIdArtista()
    {
        return $this->idArtista;
    }

    /**
     * @param int $idArtista
     */
    public function setIdArtista($idArtista)
    {
        $this->idArtista = $idArtista;
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


}
