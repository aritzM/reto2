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


}
