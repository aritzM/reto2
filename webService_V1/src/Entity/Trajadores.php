<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trajadores
 *
 * @ORM\Table(name="trajadores")
 * @ORM\Entity
 */
class Trajadores
{
    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=9, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=55, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=55, nullable=false)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=55, nullable=false)
     */
    private $direccion;

    /**
     * @var int
     *
     * @ORM\Column(name="telefono", type="integer", nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=55, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=55, nullable=false)
     */
    private $sexo;


}
