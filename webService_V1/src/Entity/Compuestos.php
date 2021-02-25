<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compuestos
 *
 * @ORM\Table(name="compuestos")
 * @ORM\Entity
 */
class Compuestos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_compuesto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCompuesto;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tema", type="integer", nullable=false)
     */
    private $idTema;

    /**
     * @var int
     *
     * @ORM\Column(name="id_maqueta", type="integer", nullable=false)
     */
    private $idMaqueta;


}
