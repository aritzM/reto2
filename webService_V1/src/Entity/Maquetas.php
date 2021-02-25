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


}
