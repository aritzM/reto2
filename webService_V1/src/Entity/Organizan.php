<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organizan
 *
 * @ORM\Table(name="organizan")
 * @ORM\Entity
 */
class Organizan
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_organiza", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrganiza;

    /**
     * @var int
     *
     * @ORM\Column(name="id_concierto", type="integer", nullable=false)
     */
    private $idConcierto;

    /**
     * @var int
     *
     * @ORM\Column(name="id_trabajador", type="integer", nullable=false)
     */
    private $idTrabajador;

    /**
     * @return int
     */
    public function getIdOrganiza()
    {
        return $this->idOrganiza;
    }

    /**
     * @param int $idOrganiza
     */
    public function setIdOrganiza($idOrganiza)
    {
        $this->idOrganiza = $idOrganiza;
    }

    /**
     * @return int
     */
    public function getIdConcierto()
    {
        return $this->idConcierto;
    }

    /**
     * @param int $idConcierto
     */
    public function setIdConcierto($idConcierto)
    {
        $this->idConcierto = $idConcierto;
    }

    /**
     * @return int
     */
    public function getIdTrabajador()
    {
        return $this->idTrabajador;
    }

    /**
     * @param int $idTrabajador
     */
    public function setIdTrabajador($idTrabajador)
    {
        $this->idTrabajador = $idTrabajador;
    }


}
