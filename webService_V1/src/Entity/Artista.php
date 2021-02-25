<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artista
 *
 * @ORM\Table(name="artista")
 * @ORM\Entity
 */
class Artista
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_artista", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArtista;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=55, nullable=false)
     */
    private $nombre;


}
