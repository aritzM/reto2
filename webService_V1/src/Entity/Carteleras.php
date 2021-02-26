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

    /**
     * @return int
     */
    public function getIdCartelera()
    {
        return $this->idCartelera;
    }

    /**
     * @param int $idCartelera
     */
    public function setIdCartelera($idCartelera)
    {
        $this->idCartelera = $idCartelera;
    }

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


}
