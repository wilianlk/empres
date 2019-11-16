<?php

namespace BackendBundle\Entity;

/**
 * Benefits
 */
class Benefits
{
    /**
     * @var integer
     */
    private $idBeneficio;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $pais;


    /**
     * Get idBeneficio
     *
     * @return integer
     */
    public function getIdBeneficio()
    {
        return $this->idBeneficio;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Benefits
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
     * Set pais
     *
     * @param string $pais
     *
     * @return Benefits
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

}
