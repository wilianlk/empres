<?php

namespace BackendBundle\Entity;

/**
 * ManagerOffice
 */
class ManagerOffice
{
    /**
     * @var integer
     */
    private $idManagerOffice;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $office;


    /**
     * Get idManagerOffice
     *
     * @return integer
     */
    public function getIdManagerOffice()
    {
        return $this->idManagerOffice;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ManagerOffice
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set office
     *
     * @param string $office
     *
     * @return ManagerOffice
     */
    public function setOffice($office)
    {
        $this->office = $office;

        return $this;
    }

    /**
     * Get office
     *
     * @return string
     */
    public function getOffice()
    {
        return $this->office;
    }
}

