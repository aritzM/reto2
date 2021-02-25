<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carteleras
 *
 * @ORM\Table(name="carteleras")
 * @ORM\Entity
 */
class Carteleras
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cartelera", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCartelera;

    /**
     * @var int
     *
     * @ORM\Column(name="id_evento", type="integer", nullable=false)
     */
    private $idEvento;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tema", type="integer", nullable=false)
     */
    private $idTema;


}
