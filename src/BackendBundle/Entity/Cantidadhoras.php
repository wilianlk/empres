<?php

namespace BackendBundle\Entity;

/**
 * Cantidadhoras
 */
class Cantidadhoras
{
    /**
     * @var integer
     */
    private $idCantidadhoras;

    /**
     * @var integer
     */
    private $idEmployee;

    /**
     * @var integer
     */
    private $cantidadhoras;


    /**
     * Get idCantidadhoras
     *
     * @return integer
     */
    public function getIdCantidadhoras()
    {
        return $this->idCantidadhoras;
    }

    /**
     * Set idEmployee
     *
     * @param integer $idEmployee
     *
     * @return Cantidadhoras
     */
    public function setIdEmployee($idEmployee)
    {
        $this->idEmployee = $idEmployee;

        return $this;
    }

    /**
     * Get idEmployee
     *
     * @return integer
     */
    public function getIdEmployee()
    {
        return $this->idEmployee;
    }

    /**
     * Set cantidadhoras
     *
     * @param integer $cantidadhoras
     *
     * @return Cantidadhoras
     */
    public function setCantidadhoras($cantidadhoras)
    {
        $this->cantidadhoras = $cantidadhoras;

        return $this;
    }

    /**
     * Get cantidadhoras
     *
     * @return integer
     */
    public function getCantidadhoras()
    {
        return $this->cantidadhoras;
    }
}

